
package app;

import java.io.BufferedReader;

import java.io.DataOutputStream;
import java.io.IOException;
import java.io.InputStreamReader;
import java.net.Socket;

public class ThreadV implements Runnable{
    private Socket client;
    private BufferedReader indalclient;
    private DataOutputStream outclient;


    public ThreadV(Socket client) {
        this.client = client;
        try {
            indalclient=new BufferedReader(new InputStreamReader(client.getInputStream()));
            outclient=new DataOutputStream(client.getOutputStream());
        } catch (Exception e) {
            //TODO: handle exception
        }
        
    }
    public void run(){
        try {
            comunica();
        } catch (Exception e) {
            //TODO: handle exception
        }
       
    }
    public void comunica() throws IOException{
        String ricevuta="";
        
        while (ricevuta.equals("fine")) {
            ricevuta=indalclient.readLine();
            System.out.println("stringa ricevuta da "+client+" contenuto stringa: "+ricevuta);


        }
        System.out.println("oh coglioncello guarda che sto chiudendo la connessione");
        client.close();
    }

}