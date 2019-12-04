
package clientetcp_lezione;

import java.io.*;
import java.net.*;

public class ClientTCP {
    private String nomeServer; //indirizzo del server
    private int porta; //Porta per servizio
    private BufferedReader tastiera; //Buffer per l'input da tastiera
    private String stringaUtente; //Stringa inserita dall'utente
    private String stringaDalServer; //Stringa ricevuta dal server
    private DataOutputStream outVersoilServer; //Stream output
    private BufferedReader inDalServer; //Stream input
    private Socket miosocket;

    public ClientTCP(String nomeServer, int porta) {
        this.nomeServer = nomeServer;
        this.porta = porta;
        tastiera=new BufferedReader(new InputStreamReader(System.in)); 
    }
     public void connetti(){
        System.out.println(" 2 - Client partito in esecuzione");
        try {
            //inizializzazione dell'oggetto socket con ip e porta del server
            miosocket=new Socket(nomeServer,porta);
            //associo al socket due oggetti per effettuare la lettura e la scrittura
            outVersoilServer=new DataOutputStream(miosocket.getOutputStream());
            inDalServer=new BufferedReader(new InputStreamReader(miosocket.getInputStream()));
        } catch(UnknownHostException ex){
            System.err.println("Host sconosciuto "+ex.getMessage() );    
        }
        catch (IOException ex) {
            System.err.println(ex.getMessage());
        }
     }
     
    public void comunica(){ 
        try {
            while(true){
                System.out.println("4- inserisci la stringa da trasmettere al server");
                stringaUtente=tastiera.readLine();
                //spedisco la stringa al server
                System.out.println("5 - Invio la stringa al server");
                outVersoilServer.writeBytes(stringaUtente+"\n");
                //leggo la risposta dal server
                stringaDalServer=inDalServer.readLine();
                System.out.println("8 - Risposta dal Server: "+stringaDalServer);
                //chiudo la connessione
                if(stringaDalServer.equals("FINE")){
                    System.out.println("9 - Client: chiudo la connessione"); 
                    break;
                }
                
            
            }
           
            miosocket.close();
        } catch (IOException ex) {
            System.err.println("Errore durante la comunicazione. "+ex.getMessage());
        }
       
     }
    
}
