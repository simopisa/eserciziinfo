package app;
//****************************************
//applicazione server
//****************************************
public class App {
    public static void main(String[] args) throws Exception {
        ServerTCP server=new ServerTCP(50000);
        server.attendi();
        server.comunica();
    }
}