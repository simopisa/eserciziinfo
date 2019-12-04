/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package servermultiplo;

/**
 *
 * @author Stefano.buffa
 */
public class ServerMultiplo {

    
    public static void main(String[] args) 
    {
        ServerM server=new ServerM(6789);
        server.attendi();
        
    }
    
}
