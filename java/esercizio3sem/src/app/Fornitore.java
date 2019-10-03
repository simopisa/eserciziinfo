package app;

/**
 * Fornitore
 */
public class Fornitore implements Runnable{
    Semaforo s1;
    public Fornitore(Semaforo s1){
        this.s1=s1;
    }
    public void run() {
        while (true) {
            
           
            s1.P();
            if (App.distributore<20) {
                
                App.distributore=100;
                
                
            } 
            s1.V();
            try {
                Thread.sleep(5000);
            } catch (Exception e) {
                //TODO: handle exception
            }
        }
    }
    
}