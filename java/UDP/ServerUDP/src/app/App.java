package app;
/** 
* * author: simone pisoni
* ! 09/01/2020
* ? server udp
*/
public class App {
    
    /** 
     * @param args
     * @throws Exception
     */
    public static void main(String[] args) throws Exception {
        UDPServer ser=new UDPServer(6789);
        ser.attendi();
        ser.Comunica();
    }
}