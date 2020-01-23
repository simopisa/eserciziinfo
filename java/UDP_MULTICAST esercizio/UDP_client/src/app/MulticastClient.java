package app;
//===========================================================================================================================
import java.io.IOException;
import java.net.DatagramPacket;
import java.net.InetAddress;
import java.net.MulticastSocket;
import java.net.Socket;
import java.net.UnknownHostException;
//===========================================================================================================================
/**
* MulticastClient
* 
* * author: simone pisoni
* ! 09/01/2020
* ? client udp
*/
//===========================================================================================================================
public class MulticastClient {
    //===========================================================================================================================
    
    private byte[] bufferIN;
    private int port;
    private InetAddress gruppo;
    private MulticastSocket miosocket;
    private DatagramPacket packetin;

    //===========================================================================================================================

    public MulticastClient(int port, String ip) {

        //===========================================================================================================================
        this.port = port;
      
        try {

            this.gruppo = InetAddress.getByName(ip);

        } catch (UnknownHostException e) {
            // TODO Auto-generated catch block
            e.printStackTrace();
        }
        //===========================================================================================================================

        bufferIN = new byte[1024];
      

        //===========================================================================================================================
        try {

            miosocket = new MulticastSocket(port);

        } catch (IOException e) {
            // TODO Auto-generated catch block
            e.printStackTrace();
        }
        //===========================================================================================================================

    }

    /** 
     *===========================================================================================================================
     ** Metodo comunica
     *===========================================================================================================================
    */
    public void comunica(){
        
        DatagramPacket packetin;
        packetin = new DatagramPacket(bufferIN, bufferIN.length);
        String ricevuto="";
        //===========================================================================================================================
        try {
            
            miosocket.joinGroup(gruppo);

        } catch (IOException e) {
            // TODO Auto-generated catch block
            e.printStackTrace();
        }
        //===========================================================================================================================
        while (!ricevuto.equals("fine")) {

            //===========================================================================================================================
            try {

                miosocket.receive(packetin);

            } catch (IOException e) {
                // TODO Auto-generated catch block
                e.printStackTrace();
            }
            //===========================================================================================================================
            ricevuto=new String(packetin.getData());

            ricevuto=ricevuto.substring(0,packetin.getLength());

            System.out.println("ricevuto: "+ricevuto+"\nDa: "+packetin.getAddress()+":"+packetin.getPort());
        }
        //===========================================================================================================================
        try {
            miosocket.leaveGroup(gruppo);
        } catch (IOException e) {
            // TODO Auto-generated catch block
            e.printStackTrace();
        }
        miosocket.close();
        //===========================================================================================================================

    }





}