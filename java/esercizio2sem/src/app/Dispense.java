package app;

/**
 * Dispense
 */
import java.util.Random;

    import app.Semaforo;
    
    /**
     * Dispenser
     */
public class Dispense implements Runnable{

    
  
        private String nome;
        private Semaforo sem1;
        private Semaforo sem2;
    
        public Dispense(String nome, Semaforo s1, Semaforo s2){
            this.nome=nome;
            this.sem1=s1;
            this.sem2=s2;
        }
        public void run(){
            int ran1=1;
            Random ran=new Random();
          while (App.dispenser>0) {
              
          
                sem1.P();
                try {
                    Thread.sleep(1000);
                } catch (Exception e) {
                    
                }
                 ran1=ran.nextInt(10);
                App.dispenser=App.dispenser-ran1;
                 System.out.println(nome+" ha consumato: "+ran1);
                 System.out.println("livello dispenser: " + App.dispenser);
                sem2.V();
          
             }
             
        }
    }

