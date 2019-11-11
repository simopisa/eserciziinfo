package app;

import java.io.BufferedReader;
import java.io.DataOutput;
import java.io.DataOutputStream;
import java.io.InputStreamReader;
import java.net.*;



/**
 * ServerTCP
 */
public class ServerTCP {
    private ServerSocket socketServer; //per mettersi in ascolto
    private Socket socketClient;
    private String stringric;
    private String stringinv;
    private DataOutputStream outversoclient; //scrivere sullo stream
    private BufferedReader indalclient; //leggere lo stream

    private int porta;//porta di ascolto

    public ServerTCP(int porta){
        this.porta=porta;
    }
    //avvio del server
    public void attendi(){
       System.out.println("1-server avviato");
       try {
        //metto in ascolto il server
        System.out.println("server: si mette in ascolto su una porta");
        socketServer=new ServerSocket(porta);
        //rimane in attesa
        socketClient=socketServer.accept();
        System.out.println("connessione da: "+socketClient.getRemoteSocketAddress());

        socketServer.close();

        //associo due oggetti per lettura e scrittura al socket

        indalclient=new BufferedReader(new InputStreamReader(socketClient.getInputStream()));
        outversoclient=new DataOutputStream(socketClient.getOutputStream());
        
       } catch (Exception e) {
          
       }

       
    }
    public void comunica(){
        //server in attesa del messaggio
       
        try {
            System.out.println("server in attesa del messaggio");
            //ricevo la stringa
            stringric=indalclient.readLine();
            System.out.println("<<stringa ricevuta: "+stringric);
            //elaborazione server
            stringinv=stringric.toUpperCase();
            outversoclient.writeBytes(stringinv+"\n");
            System.out.println(">>stringa inviata: "+stringinv);
            System.out.println("fine elaborazione");
            socketClient.close();
        } catch (Exception e) {
            //TODO: handle exception
        }
        
    }
}