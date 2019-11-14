package app;
//****************************************
//applicazione server
//****************************************
public class App {
    public static void main(String[] args) throws Exception {
        ServerTCP server=new ServerTCP(6789);
        server.attendi();
        server.comunica();
    }
}