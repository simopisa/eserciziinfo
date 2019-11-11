package app;

import java.io.BufferedReader;
import java.io.DataOutput;
import java.io.DataOutputStream;
import java.io.InputStreamReader;
import java.net.*;

/**
 * ClientTCP
 */
public class ClientTCP {

    private Socket miosocket; //per mettersi in ascolto
    private String stringdalserver;
    private String stringutente;
    private DataOutputStream outversoserver; //scrivere sullo stream
    private BufferedReader indalserver; //stream input
    private String nomeserver;
    private int porta;//porta di ascolto
    private BufferedReader tastiera; //prendere da tastiera

    public ClientTCP(int porta, String nomeserver){
        this.porta=porta;
        this.nomeserver=nomeserver;
        tastiera=new BufferedReader(new InputStreamReader(System.in));
    }
    public void connetti(){
        System.out.println("2-client in esecuzione");
        try {
            System.out.println("richedo la connessione");
            miosocket=new Socket(nomeserver, porta);
            indalserver=new BufferedReader(new InputStreamReader(miosocket.getInputStream()));
            outversoserver=new DataOutputStream(miosocket.getOutputStream());

        } catch (Exception e) {
          System.out.println("host sconosciuto");
        }
        //inizializzo il socket
       
    }
    public void comunica(){
        //client richiede stringa da inviare
        //invio stringa    
        try {
            System.out.println("inserisci la stringa da inviare");
            stringutente=tastiera.readLine();
            System.out.println("invio stringa");
            outversoserver.writeBytes(stringutente+"\n");
            //client attende la risposta e visualizza
            stringdalserver=indalserver.readLine();
            System.out.println("risposta: "+stringdalserver); 
            //chiudo la connessione
            miosocket.close();
            
        } catch (Exception e) {
            //TODO: handle exception
        }
        
    }
    
}