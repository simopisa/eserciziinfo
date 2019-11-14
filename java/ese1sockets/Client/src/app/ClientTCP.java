package app;

import java.io.BufferedReader;

import java.io.DataOutputStream;
import java.io.InputStreamReader;
import java.net.*;

/**
 * ClientTCP
 */
public class ClientTCP {

    private Socket miosocket; // per mettersi in ascolto
    private String stringdalserver;
    private String stringutente;
    private DataOutputStream outversoserver; // scrivere sullo stream
    private BufferedReader indalserver; // stream input
    private String nomeserver;
    private int porta;// porta di ascolto
    private BufferedReader tastiera; // prendere da tastiera
    //=======================================================================================================================
    public ClientTCP(int porta, String nomeserver) {
        this.porta = porta;
        this.nomeserver = nomeserver;
        tastiera = new BufferedReader(new InputStreamReader(System.in));
    }
    //=======================================================================================================================
    public void connetti() {
        //=======================================================================================================================
        System.out.println("2-client in esecuzione");
        //=======================================================================================================================
        try {
            //=======================================================================================================================
            System.out.println("richedo la connessione");

            miosocket = new Socket(nomeserver, porta);

            indalserver = new BufferedReader(new InputStreamReader(miosocket.getInputStream()));

            outversoserver = new DataOutputStream(miosocket.getOutputStream());

            System.out.println("connesso con: " + nomeserver + ":" + porta);
            //=======================================================================================================================
        } catch (Exception e) {
            System.out.println("host sconosciuto");
        }
        //=======================================================================================================================
        // inizializzo il socket

    }
    //=======================================================================================================================
    public void comunica() {
        // client richiede stringa da inviare
        // invio stringa
        boolean controllo=true;
        //=======================================================================================================================
        do {
            //=======================================================================================================================
            try {
                //=======================================================================================================================
                System.out.print("---inserisci una parola: ");

                stringutente = tastiera.readLine();

                System.out.println("---invio la parola al server");

                outversoserver.writeBytes(stringutente + "\n");

                System.out.println("---attendo risposta dal server");
                // client attende la risposta e visualizza
                stringdalserver = indalserver.readLine();

                System.out.println(stringdalserver);
                String[] parts = stringdalserver.split("#");
                String numerovoc=parts[0].substring(1);
                String numerocons=parts[1].substring(1);
                int numerovoc1=Integer.parseInt(numerovoc);
                int numerocons1=Integer.parseInt(numerocons);

                //=======================================================================================================================
                if (numerocons1/2==numerovoc1) {
                    System.out.println("---numero di consonanti esattamente la metà del numero di vocali");

                    controllo=false;
                    outversoserver.writeBytes("FINE" + "\n");
                }else{
                    System.out.println("vocali"+numerovoc1+"consonanti"+numerocons1);
                }
                //=======================================================================================================================
            } catch (Exception e) {
                // TODO: handle exception
            }
            //=======================================================================================================================
        } while (controllo);
        //=======================================================================================================================
        try {
            // chiudo la connessione
            miosocket.close();
        } catch (Exception e) {
            // TODO: handle exception
        }
        //=======================================================================================================================
    }

}