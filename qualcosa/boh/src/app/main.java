package app;
//======================================================
// Source code generated by jvider v1.8.1 UNREGISTERED version.
// http://www.jvider.com/
//======================================================
import javax.swing.JFrame;
import javax.swing.UIManager;
import javax.swing.UnsupportedLookAndFeelException;
import javax.swing.JPanel;
import javax.swing.BorderFactory;
import java.awt.GridBagConstraints;
import java.awt.GridBagLayout;
import java.awt.Insets;
import javax.swing.JButton;
import javax.swing.JTextField;
/**
 * @author  Administrator
 * @created December 20, 2019
 */
public class main extends JFrame 
{
static main themain;

JPanel pnApp;
JButton btBut0;
JTextField tfText;
/**
 */
public static void main( String args[] ) 
{
   try 
   {
      UIManager.setLookAndFeel(UIManager.getSystemLookAndFeelClassName());
   }
   catch ( ClassNotFoundException e ) 
   {
   }
   catch ( InstantiationException e ) 
   {
   }
   catch ( IllegalAccessException e ) 
   {
   }
   catch ( UnsupportedLookAndFeelException e ) 
   {
   }
   themain = new main();

} 

/**
 */
public main() 
{
   super( "TITLE" );

   pnApp = new JPanel();
   GridBagLayout gbApp = new GridBagLayout();
   GridBagConstraints gbcApp = new GridBagConstraints();
   pnApp.setLayout( gbApp );

   btBut0 = new JButton( "scrivi"  );
   gbcApp.gridx = 1;
   gbcApp.gridy = 1;
   gbcApp.gridwidth = 17;
   gbcApp.gridheight = 3;
   gbcApp.fill = GridBagConstraints.BOTH;
   gbcApp.weightx = 1;
   gbcApp.weighty = 0;
   gbcApp.anchor = GridBagConstraints.NORTH;
   gbApp.setConstraints( btBut0, gbcApp );
   pnApp.add( btBut0 );

   tfText = new JTextField( );
   gbcApp.gridx = 1;
   gbcApp.gridy = 5;
   gbcApp.gridwidth = 17;
   gbcApp.gridheight = 4;
   gbcApp.fill = GridBagConstraints.BOTH;
   gbcApp.weightx = 1;
   gbcApp.weighty = 0;
   gbcApp.anchor = GridBagConstraints.NORTH;
   gbApp.setConstraints( tfText, gbcApp );
   pnApp.add( tfText );

   setDefaultCloseOperation( EXIT_ON_CLOSE );

   setContentPane( pnApp );
   pack();
   setVisible( true );
   
} 
} 
