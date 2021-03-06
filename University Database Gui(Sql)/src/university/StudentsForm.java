package university;

import com.mysql.jdbc.Connection;
import java.awt.HeadlessException;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.text.SimpleDateFormat;
import java.util.ArrayList;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.swing.JOptionPane;
import javax.swing.table.DefaultTableModel;

/**
 *
 * @author abhi
 */
public class StudentsForm extends javax.swing.JFrame {

    /**
     * Creates new form StudentsForm
     */
    public StudentsForm() {
        initComponents();
        //MySqlConnection(); Only for testing that DB Connection is successfull or not
        fillTable();
        
    }
    
    public Connection MySqlConnection() {
        
        Connection conn = null;
        try {
            Class.forName("com.mysql.jdbc.Driver");
            conn = (Connection) DriverManager.getConnection("jdbc:mysql://localhost:3306/College_project",
                    "root","9821476621");
            return conn;
        }
            
        catch (ClassNotFoundException | SQLException | HeadlessException e) {
            JOptionPane.showMessageDialog(null,"Mysql Connection Failed ....");
        }
        return null;
    }
    
     public ArrayList<StudentBean> retrieveData() {
        ArrayList<StudentBean> al=null;
            al= new ArrayList<StudentBean>();
        try {
            Connection  conn = MySqlConnection();
            String query = "Select * from Students";
            Statement st = conn.createStatement();
            ResultSet rs = st.executeQuery(query);
            StudentBean student;
            while (rs.next()) {
                student = new StudentBean(rs.getInt(1),rs.getString(2),rs.getString(3),rs.getString(4));
                al.add(student);
            }
        }
        catch (Exception e) {
                System.out.println(e);
        }
        return al;
    }
     
     public void fillTable() {
         ArrayList<StudentBean> al = retrieveData();
         DefaultTableModel model = (DefaultTableModel)table.getModel();
         model.setRowCount(0);
         Object [] row =new Object[4];
         for (int i =0 ;i <al.size();i++) {
             row[0] = al.get(i).getRollno();
             row[1] = al.get(i).getName();
             row[2] = al.get(i).getDob();
             row[3] = al.get(i).getCredits();
             model.addRow(row);
   
         }
          
         
     }
         
        

    /**
     * This method is called from within the constructor to initialize the form.
     * WARNING: Do NOT modify this code. The content of this method is always
     * regenerated by the Form Editor.
     */
    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        jScrollPane1 = new javax.swing.JScrollPane();
        jTable1 = new javax.swing.JTable();
        jPanel1 = new javax.swing.JPanel();
        exit = new javax.swing.JButton();
        update = new javax.swing.JButton();
        jLabel4 = new javax.swing.JLabel();
        name = new javax.swing.JTextField();
        rollno = new javax.swing.JTextField();
        delete = new javax.swing.JButton();
        jLabel1 = new javax.swing.JLabel();
        jLabel2 = new javax.swing.JLabel();
        insert = new javax.swing.JButton();
        jLabel3 = new javax.swing.JLabel();
        dob = new com.toedter.calendar.JDateChooser();
        jScrollPane2 = new javax.swing.JScrollPane();
        table = new javax.swing.JTable();
        credits = new javax.swing.JTextField();
        jLabel6 = new javax.swing.JLabel();
        jButton1 = new javax.swing.JButton();
        jLabel7 = new javax.swing.JLabel();

        jTable1.setModel(new javax.swing.table.DefaultTableModel(
            new Object [][] {
                {null, null, null, null},
                {null, null, null, null},
                {null, null, null, null},
                {null, null, null, null}
            },
            new String [] {
                "Title 1", "Title 2", "Title 3", "Title 4"
            }
        ));
        jScrollPane1.setViewportView(jTable1);

        setDefaultCloseOperation(javax.swing.WindowConstants.EXIT_ON_CLOSE);
        setTitle("Student Portal");

        exit.setFont(new java.awt.Font("Ubuntu Mono", 1, 14)); // NOI18N
        exit.setText("Exit");
        exit.setBorder(javax.swing.BorderFactory.createLineBorder(new java.awt.Color(26, 198, 255), 4));
        exit.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                exitActionPerformed(evt);
            }
        });

        update.setFont(new java.awt.Font("Ubuntu Mono", 1, 14)); // NOI18N
        update.setText("Update");
        update.setBorder(javax.swing.BorderFactory.createLineBorder(new java.awt.Color(26, 198, 254), 4));
        update.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                updateActionPerformed(evt);
            }
        });

        jLabel4.setBackground(new java.awt.Color(26, 198, 255));
        jLabel4.setFont(new java.awt.Font("Ubuntu Mono", 3, 48)); // NOI18N
        jLabel4.setForeground(new java.awt.Color(26, 198, 255));
        jLabel4.setHorizontalAlignment(javax.swing.SwingConstants.CENTER);
        jLabel4.setText("Student Portal");

        rollno.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                rollnoActionPerformed(evt);
            }
        });

        delete.setFont(new java.awt.Font("Ubuntu Mono", 1, 14)); // NOI18N
        delete.setText("Delete");
        delete.setBorder(javax.swing.BorderFactory.createLineBorder(new java.awt.Color(26, 198, 254), 4));
        delete.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                deleteActionPerformed(evt);
            }
        });

        jLabel1.setFont(new java.awt.Font("Ubuntu Mono", 1, 18)); // NOI18N
        jLabel1.setForeground(new java.awt.Color(26, 198, 255));
        jLabel1.setText("NAME");

        jLabel2.setFont(new java.awt.Font("Ubuntu Mono", 1, 18)); // NOI18N
        jLabel2.setForeground(new java.awt.Color(26, 198, 255));
        jLabel2.setText("ROLL NUMBER");

        insert.setFont(new java.awt.Font("Ubuntu Mono", 1, 14)); // NOI18N
        insert.setText("Insert");
        insert.setBorder(javax.swing.BorderFactory.createLineBorder(new java.awt.Color(26, 198, 254), 4));
        insert.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                insertActionPerformed(evt);
            }
        });

        jLabel3.setFont(new java.awt.Font("Ubuntu Mono", 1, 18)); // NOI18N
        jLabel3.setForeground(new java.awt.Color(26, 198, 255));
        jLabel3.setText("D.O.B");

        dob.setDateFormatString("dd-MM-yyyy");

        table.setModel(new javax.swing.table.DefaultTableModel(
            new Object [][] {

            },
            new String [] {
                "Roll Number", "Name", "DOB", "Credits"
            }
        ) {
            boolean[] canEdit = new boolean [] {
                false, true, false, true
            };

            public boolean isCellEditable(int rowIndex, int columnIndex) {
                return canEdit [columnIndex];
            }
        });
        jScrollPane2.setViewportView(table);

        credits.setFont(new java.awt.Font("Ubuntu Mono", 1, 18)); // NOI18N
        credits.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                creditsActionPerformed(evt);
            }
        });

        jLabel6.setFont(new java.awt.Font("Ubuntu Mono", 1, 18)); // NOI18N
        jLabel6.setForeground(new java.awt.Color(26, 198, 254));
        jLabel6.setText("CREDITS");

        jButton1.setFont(new java.awt.Font("Ubuntu Mono", 1, 12)); // NOI18N
        jButton1.setText("Portal");
        jButton1.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jButton1ActionPerformed(evt);
            }
        });

        jLabel7.setFont(new java.awt.Font("Ubuntu Mono", 1, 14)); // NOI18N
        jLabel7.setHorizontalAlignment(javax.swing.SwingConstants.TRAILING);
        jLabel7.setText("Go Back To");

        javax.swing.GroupLayout jPanel1Layout = new javax.swing.GroupLayout(jPanel1);
        jPanel1.setLayout(jPanel1Layout);
        jPanel1Layout.setHorizontalGroup(
            jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel1Layout.createSequentialGroup()
                .addContainerGap()
                .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addComponent(jLabel4, javax.swing.GroupLayout.PREFERRED_SIZE, 478, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addGroup(jPanel1Layout.createSequentialGroup()
                        .addGap(10, 10, 10)
                        .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                            .addGroup(jPanel1Layout.createSequentialGroup()
                                .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                                    .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING, false)
                                        .addComponent(jLabel2, javax.swing.GroupLayout.DEFAULT_SIZE, 114, Short.MAX_VALUE)
                                        .addComponent(jLabel3, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
                                    .addComponent(jLabel1, javax.swing.GroupLayout.PREFERRED_SIZE, 99, javax.swing.GroupLayout.PREFERRED_SIZE)
                                    .addComponent(jLabel6))
                                .addGap(18, 18, 18)
                                .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                                    .addComponent(name, javax.swing.GroupLayout.PREFERRED_SIZE, 239, javax.swing.GroupLayout.PREFERRED_SIZE)
                                    .addComponent(rollno, javax.swing.GroupLayout.PREFERRED_SIZE, 239, javax.swing.GroupLayout.PREFERRED_SIZE)
                                    .addComponent(dob, javax.swing.GroupLayout.PREFERRED_SIZE, 239, javax.swing.GroupLayout.PREFERRED_SIZE)
                                    .addComponent(credits, javax.swing.GroupLayout.PREFERRED_SIZE, 239, javax.swing.GroupLayout.PREFERRED_SIZE)))
                            .addGroup(jPanel1Layout.createSequentialGroup()
                                .addComponent(delete, javax.swing.GroupLayout.PREFERRED_SIZE, 98, javax.swing.GroupLayout.PREFERRED_SIZE)
                                .addGap(18, 18, 18)
                                .addComponent(update, javax.swing.GroupLayout.PREFERRED_SIZE, 92, javax.swing.GroupLayout.PREFERRED_SIZE)
                                .addGap(18, 18, 18)
                                .addComponent(insert, javax.swing.GroupLayout.PREFERRED_SIZE, 101, javax.swing.GroupLayout.PREFERRED_SIZE)
                                .addGap(18, 18, 18)
                                .addComponent(exit, javax.swing.GroupLayout.PREFERRED_SIZE, 104, javax.swing.GroupLayout.PREFERRED_SIZE))
                            .addComponent(jScrollPane2, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))))
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
            .addGroup(jPanel1Layout.createSequentialGroup()
                .addGap(0, 0, Short.MAX_VALUE)
                .addComponent(jLabel7, javax.swing.GroupLayout.PREFERRED_SIZE, 95, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addGap(4, 4, 4)
                .addComponent(jButton1, javax.swing.GroupLayout.PREFERRED_SIZE, 65, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addGap(40, 40, 40))
        );
        jPanel1Layout.setVerticalGroup(
            jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel1Layout.createSequentialGroup()
                .addContainerGap()
                .addComponent(jLabel4, javax.swing.GroupLayout.PREFERRED_SIZE, 72, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addGap(27, 27, 27)
                .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(name, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(jLabel1, javax.swing.GroupLayout.PREFERRED_SIZE, 28, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addGap(18, 18, 18)
                .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(rollno, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(jLabel2, javax.swing.GroupLayout.PREFERRED_SIZE, 28, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addGap(15, 15, 15)
                .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING, false)
                    .addComponent(jLabel3, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                    .addComponent(dob, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
                .addGap(18, 18, 18)
                .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING)
                    .addComponent(credits, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(jLabel6))
                .addGap(18, 18, 18)
                .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(delete, javax.swing.GroupLayout.PREFERRED_SIZE, 49, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(update, javax.swing.GroupLayout.PREFERRED_SIZE, 49, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(insert, javax.swing.GroupLayout.PREFERRED_SIZE, 49, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(exit, javax.swing.GroupLayout.PREFERRED_SIZE, 49, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addGap(29, 29, 29)
                .addComponent(jScrollPane2, javax.swing.GroupLayout.PREFERRED_SIZE, 134, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, 24, Short.MAX_VALUE)
                .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jButton1, javax.swing.GroupLayout.PREFERRED_SIZE, 27, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(jLabel7, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
                .addContainerGap())
        );

        javax.swing.GroupLayout layout = new javax.swing.GroupLayout(getContentPane());
        getContentPane().setLayout(layout);
        layout.setHorizontalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addComponent(jPanel1, javax.swing.GroupLayout.Alignment.TRAILING, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
        );
        layout.setVerticalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                .addComponent(jPanel1, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
        );

        pack();
    }// </editor-fold>//GEN-END:initComponents

    private void deleteActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_deleteActionPerformed
        if(rollno!=null || name.getText()!=null || dob != null || credits !=null )
           {
               try {
                   Connection conn = MySqlConnection();
                   String query = "delete from Students where Student_id =?";
                   PreparedStatement ps = conn.prepareStatement(query);
                   ps.setInt(1,Integer.parseInt(rollno.getText()));
                   
                   int result = ps.executeUpdate();
                   if(result >=1) {
                       JOptionPane.showMessageDialog(null,result+" Number of student deleted into database ....");
                       rollno.setText("");
                       name.setText("");
                       credits.setText("");
                       //dob.setDate("");
                       fillTable();
                   } else {
                       JOptionPane.showMessageDialog(null,"Student Deletion failure ....");
                   }
                   
               } catch (Exception ex) {
                   JOptionPane.showMessageDialog(null,ex);
               }
               
           } else {
               JOptionPane.showMessageDialog(null,"All fields are COMPULSORY .....");
           }
    }//GEN-LAST:event_deleteActionPerformed

    private void rollnoActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_rollnoActionPerformed
        // TODO add your handling code here:
    }//GEN-LAST:event_rollnoActionPerformed

    private void insertActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_insertActionPerformed
           if(rollno!=null || name.getText()!=null || dob != null || credits !=null )
           {
               try {
                   if (Integer.parseInt(credits.getText()) > 10)
                   {
                       JOptionPane.showMessageDialog(null,"Credit score should be under 10 , please enter valid details");
                   }
                   else {
                   Connection conn = MySqlConnection();
                   String query = "insert into Students(Student_id,student_name,dob,credits) values(?,?,?,?)";
                   PreparedStatement ps = conn.prepareStatement(query);
                   ps.setInt(1,Integer.parseInt(rollno.getText()));
                   ps.setString(2,name.getText());
                   SimpleDateFormat sdf = new SimpleDateFormat("dd-MM-yyyy");
                   String dob1 = sdf.format(dob.getDate());
                   ps.setString(3,dob1);
                   ps.setString(4,credits.getText());
                   
                   int result = ps.executeUpdate();
                   if(result >=1) {
                       JOptionPane.showMessageDialog(null,result+" Number of student insert into database ....");
                       rollno.setText("");
                       name.setText("");
                       credits.setText("");
                       //dob.setDate("");
                       fillTable();
                   } else {
                       JOptionPane.showMessageDialog(null,"Student Insertion failure ....");
                   }
                   
               } 
               } catch (NumberFormatException | HeadlessException | SQLException ex) {
                   Logger.getLogger(StudentsForm.class.getName()).log(Level.SEVERE, null, ex);
               }
               
           } else {
               JOptionPane.showMessageDialog(null,"All fields are COMPULSORY .....");
           }
    }//GEN-LAST:event_insertActionPerformed

    private void updateActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_updateActionPerformed
            if(rollno!=null || name!=null || dob != null || credits!=null )
           {
               try {
                   if (Integer.parseInt(credits.getText()) > 10)
                   {
                       JOptionPane.showMessageDialog(null,"Credit score should be under 10 , please enter valid details");
                   }
                   else
                   {
                       
                       Connection conn = MySqlConnection();
                       String query = "update Students set student_name =? , dob=? ,credits =? where Student_id=? ";
                       PreparedStatement ps = conn.prepareStatement(query);
                       ps.setInt(4,Integer.parseInt(rollno.getText()));
                       
                       ps.setString(1,name.getText());
                       SimpleDateFormat sdf = new SimpleDateFormat("dd-MM-yyyy");
                       String dob1 = sdf.format(dob.getDate());
                       ps.setString(2,dob1);
                       ps.setString(3,credits.getText());
                       
                       int result = ps.executeUpdate();
                       if(result >=1) {
                           JOptionPane.showMessageDialog(null,result+" Number of student updated into database ....");
                           rollno.setText("");
                           name.setText("");
                           credits.setText("");
                           //dob.setDate("");
                           fillTable();
                       }
                       else {
                           JOptionPane.showMessageDialog(null,"Student Updation failure ....");
                       }
                   }
                   
               } 
               catch (NumberFormatException | HeadlessException | SQLException ex) {
                   JOptionPane.showMessageDialog(null,ex);
               }
               
           } else {
               JOptionPane.showMessageDialog(null,"All fields are COMPULSORY .....");
           }
    }//GEN-LAST:event_updateActionPerformed

    private void creditsActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_creditsActionPerformed
        // TODO add your handling code here:
    }//GEN-LAST:event_creditsActionPerformed

    private void exitActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_exitActionPerformed
       System.exit(0);
    }//GEN-LAST:event_exitActionPerformed

    private void jButton1ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jButton1ActionPerformed
       new Portals().setVisible(true);
       this.setVisible(false);
    }//GEN-LAST:event_jButton1ActionPerformed

    /**
     * @param args the command line arguments
     */
    public static void main(String args[]) {
        /* Set the Nimbus look and feel */
        //<editor-fold defaultstate="collapsed" desc=" Look and feel setting code (optional) ">
        /* If Nimbus (introduced in Java SE 6) is not available, stay with the default look and feel.
         * For details see http://download.oracle.com/javase/tutorial/uiswing/lookandfeel/plaf.html 
         */
        try {
            for (javax.swing.UIManager.LookAndFeelInfo info : javax.swing.UIManager.getInstalledLookAndFeels()) {
                if ("Nimbus".equals(info.getName())) {
                    javax.swing.UIManager.setLookAndFeel(info.getClassName());
                    break;
                }
            }
        } catch (ClassNotFoundException ex) {
            java.util.logging.Logger.getLogger(StudentsForm.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (InstantiationException ex) {
            java.util.logging.Logger.getLogger(StudentsForm.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (IllegalAccessException ex) {
            java.util.logging.Logger.getLogger(StudentsForm.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (javax.swing.UnsupportedLookAndFeelException ex) {
            java.util.logging.Logger.getLogger(StudentsForm.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        }
        //</editor-fold>

        /* Create and display the form */
        java.awt.EventQueue.invokeLater(new Runnable() {
            public void run() {
                new StudentsForm().setVisible(true);
            }
        });
    }

    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JTextField credits;
    private javax.swing.JButton delete;
    private com.toedter.calendar.JDateChooser dob;
    private javax.swing.JButton exit;
    private javax.swing.JButton insert;
    private javax.swing.JButton jButton1;
    private javax.swing.JLabel jLabel1;
    private javax.swing.JLabel jLabel2;
    private javax.swing.JLabel jLabel3;
    private javax.swing.JLabel jLabel4;
    private javax.swing.JLabel jLabel6;
    private javax.swing.JLabel jLabel7;
    private javax.swing.JPanel jPanel1;
    private javax.swing.JScrollPane jScrollPane1;
    private javax.swing.JScrollPane jScrollPane2;
    private javax.swing.JTable jTable1;
    private javax.swing.JTextField name;
    private javax.swing.JTextField rollno;
    private javax.swing.JTable table;
    private javax.swing.JButton update;
    // End of variables declaration//GEN-END:variables
}
