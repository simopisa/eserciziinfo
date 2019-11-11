package app;
//****************************************
//applicazione per client
//****************************************
public class App {
    public static void main(String[] args) throws Exception {
        // java sockets con protocollo tcp/ip
        ClientTCP client=new ClientTCP(6789, "10.0.74.27");
        client.connetti();
        client.comunica();

    }
}