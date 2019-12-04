/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package servermultiplo;

import java.io.BufferedReader;
import java.io.DataOutputStream;
import java.io.IOException;
import java.io.InputStreamReader;
import java.net.Socket;
import java.util.logging.Level;
import java.util.logging.Logger;


public class ServerThread  implements Runnable
{
    private Socket client;
    private BufferedReader inDalClient;
    private DataOutputStream outClient;

    public ServerThread(Socket client) 
    {
        this.client = client;
        try 
        {
            inDalClient = new BufferedReader(new InputStreamReader(client.getInputStream()));
            outClient =new DataOutputStream(client.getOutputStream());
        } catch (IOException ex)
        {
            Logger.getLogger(ServerThread.class.getName()).log(Level.SEVERE, null, ex);
        }
        
    }
    
    @Override
    public void run()
    {
        try 
        {
            comunica();
        } catch (IOException ex) 
        {
            Logger.getLogger(ServerThread.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
    
    public void comunica() throws IOException
    {
        
        String ricevuta="";
        Boolean continua=true;
        // la comunicazione continua finche il server non riceve fine 
        while(continua)
        {
            ricevuta=inDalClient.readLine();
            System.out.println("Ricevuta dal client "+client+",messaggio :"+ricevuta);
            ricevuta=ricevuta.toUpperCase();
            if("FINE".equals(ricevuta))
            {
                continua=false;
                System.out.println("sto per chiudere ...");
            }
            System.out.println("Ritrasmetto messaggio "+ricevuta);
            outClient.writeBytes(ricevuta+"\n");
        }
        client.close();
        
    }
    
    
    
}
