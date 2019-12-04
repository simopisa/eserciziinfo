
package clientetcp_lezione;

public class ClienteTCP_Lezione {
    public static void main(String[] args) {
        ClientTCP client=new ClientTCP("127.0.0.1",6789);
        client.connetti();
        client.comunica();
    }
    
}



