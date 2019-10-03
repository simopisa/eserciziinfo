package app;

import java.util.Random;

/**
 * Distributore
 */
public class Distributore implements Runnable {
    private String nome;
    private Semaforo sem1;
    

    public Distributore(String nome, Semaforo s1){
        this.nome=nome;
        this.sem1=s1;
       
    }

    public void run(){
        int ran1=1;
        Random ran=new Random();
        boolean controllo=true;
      while (App.distributore>20) {
          
             ran1=ran.nextInt(10);
            sem1.P();
            try {
                Thread.sleep(ran1*100);
            } catch (Exception e) {
                
            }
             
                App.distributore=App.distributore-ran1;
                System.out.println(nome+" ha prelevato: "+ran1+"litri, ed ha aspettato "+ran1*100+" millisecondi");
                System.out.println("livello distributore: " + App.distributore);
             

               
            sem1.V();
            if (App.distributore<20) {
                System.out.println("aspetto il rifornimento");
                
         try {
             Thread.sleep(5000);
         } catch (Exception e) {
             
         }
         System.out.println("il distributore è stato rifornito, ora il valore è di "+ App.distributore);
            }
            
     
         }
         
     
      
    }
    
    
}