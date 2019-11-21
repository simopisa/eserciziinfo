package app;

//****************************************
//applicazione per client
//****************************************
public class App {
    public static void main(String[] args) throws Exception {
        // java sockets con protocollo tcp/ip
        ClientTCP client = new ClientTCP(50000, "localhost");
        client.connetti();
        client.comunica();

    }
}