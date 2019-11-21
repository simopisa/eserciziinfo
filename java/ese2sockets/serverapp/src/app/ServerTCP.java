package app;

import java.io.BufferedReader;

import java.io.DataOutputStream;
import java.io.InputStreamReader;
import java.net.*;
import java.util.HashMap;
import java.util.Map;

/**
 * ServerTCP
 */
public class ServerTCP {
    private ServerSocket socketServer; // per mettersi in ascolto
    private Socket socketClient;
    private String stringric;
    private String stringinv;
    private DataOutputStream outversoclient; // scrivere sullo stream
    private BufferedReader indalclient; // leggere lo stream
    private int porta;// porta di ascolto
    //=======================================================================================================================
    public ServerTCP(int porta) {
        this.porta = porta;
    }
    //=======================================================================================================================
    // avvio del server
    public void attendi() {
        System.out.println("1-server avviato");
        try {
            // metto in ascolto il server
            System.out.println("server: si mette in ascolto su una porta");

            socketServer = new ServerSocket(porta);
            // rimane in attesa
            socketClient = socketServer.accept();

            System.out.println("connessione da: " + socketClient.getRemoteSocketAddress());

            socketServer.close();

            // associo due oggetti per lettura e scrittura al socket

            indalclient = new BufferedReader(new InputStreamReader(socketClient.getInputStream()));

            outversoclient = new DataOutputStream(socketClient.getOutputStream());

        } catch (Exception e) {

        }

    }
    //=======================================================================================================================

    public void comunica() {
        // server in attesa del messaggio
        //=======================================================================================================================
        try {
            //=======================================================================================================================
            do {
                //=======================================================================================================================
                Map<String, String> listacomandi = new HashMap<String, String>();
                listacomandi.put("IM", "pomodoro, mozzarella");
                listacomandi.put("IV", "pomodoro, mozzarella, zucchine, melanzane, peperoni");
                listacomandi.put("IC", "pomodoro, mozzarella, uovo, funghi, prosciutto");
                listacomandi.put("PM", "6");
                listacomandi.put("PV", "7");
                listacomandi.put("PC", "8");
                listacomandi.put("FINE", "FINE");
                //=======================================================================================================================

                System.out.println(">>>server in attesa del messaggio");
                
                //=======================================================================================================================

                stringric = indalclient.readLine();
                System.out.println(">>>stringa ricevuta: " + stringric);

                //=======================================================================================================================


                if (listacomandi.get(stringric)==null) {
                    int num_mar=0, num_veg=0, num_cap=0;
                    String[] acquistare=stringric.split("#");
                    num_mar=Integer.parseInt(acquistare[1]);
                    num_veg=Integer.parseInt(acquistare[2]);
                    num_cap=Integer.parseInt(acquistare[3]);
                    int tot=num_mar*Integer.parseInt(listacomandi.get("PM"))+num_veg*Integer.parseInt(listacomandi.get("PV"))+num_cap*Integer.parseInt(listacomandi.get("PC"));
                    stringinv="prezzo totale: "+tot;
                    outversoclient.writeBytes( "prezzo totale: "+tot + "\n");
                }else{
                    stringinv=listacomandi.get(stringric);
                    outversoclient.writeBytes( listacomandi.get(stringric) + "\n");
                }
                
                //=======================================================================================================================


                System.out.println(">>>stringa inviata: " + stringinv);

                
                //=======================================================================================================================
            } while (stringric.compareTo("FINE") != 0);
            //=======================================================================================================================
            socketClient.close();
            //=======================================================================================================================
        } catch (Exception e) {
            // TODO: handle exception
        }
        //=======================================================================================================================
    }
}