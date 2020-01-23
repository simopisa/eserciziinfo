package app;
/** 
* * author: simone pisoni
* ! 09/01/2020
* ? client udp
*/
public class App {
    
    /** 
     * @param args
     * @throws Exception
     */
    public static void main(String[] args) throws Exception {
       UDPClient cli=new UDPClient("10.0.74.21",6789);
       cli.connetti();
       cli.comunica();
        
    }
}
