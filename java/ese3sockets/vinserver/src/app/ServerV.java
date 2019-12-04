package app;

import java.net.ServerSocket;

public class ServerV {
   private ServerSocket server;
   private int porta;
   

    public ServerV(int porta) {
        this.porta = porta;
    }

    public void attesa(){
        try {
            server=new ServerSocket(porta);
            System.out.println("server partito ed in esecuzione........");
            
            while (true) {
                
            }



        } catch (Exception e) {
            //TODO: handle exception
        }
       

    }
}