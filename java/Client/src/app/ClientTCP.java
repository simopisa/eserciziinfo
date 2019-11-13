package app;

import java.io.BufferedReader;

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
            System.out.println("connesso con: "+nomeserver+":"+porta);
        } catch (Exception e) {
          System.out.println("host sconosciuto");
        }
        //inizializzo il socket
       
    }
    public void comunica(){
        //client richiede stringa da inviare
        //invio stringa    
        do {
            try {
               do {
                  
                System.out.print(">>");
                stringutente=tastiera.readLine();
                
                outversoserver.writeBytes(stringutente+"\n");
               } while (!stringutente.contains("|"));
               do {
                //client attende la risposta e visualizza
                stringdalserver=indalserver.readLine();
                System.out.println(nomeserver+":"+porta+">> "+stringdalserver); 
                } while (!stringdalserver.contains("|"));
               
                
            } catch (Exception e) {
                //TODO: handle exception
            }
        } while (stringutente.compareTo("fine|")!=0 && stringutente.compareTo("FINE|")!=0 && stringdalserver.compareTo("fine|")!=0 && stringdalserver.compareTo("FINE|")!=0);
        try {
             //chiudo la connessione

            miosocket.close();
        } catch (Exception e) {
            //TODO: handle exception
        }
       
        
    }
    
}