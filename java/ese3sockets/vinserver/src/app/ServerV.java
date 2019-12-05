/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package app;

import java.io.IOException;
import java.net.ServerSocket;
import java.net.Socket;
import java.util.logging.Level;
import java.util.logging.Logger;


public class ServerV
{
    private ServerSocket server;
    private int porta;

    public ServerV(int porta)
    {
        this.porta = porta;
    }
    
    public void attendi()
    {
        try 
        {
            server=new ServerSocket(porta);
            System.out.println("server partito in esecuzione...");
            
            while(true)
            {
                //quando arriva la richiesta da parte del client 
                //istanzo un thread a cui passo l'oggetto soket
                Socket client=server.accept();
                Thread th=new Thread(new ThreadV(client));
                th.start();
                
            }
            
        } catch (IOException ex) {
            System.out.println(ex.getMessage());
        }
    }
    
    
    
}
