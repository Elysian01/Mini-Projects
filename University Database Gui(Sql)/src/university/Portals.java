/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package university;

/**
 *
 * @author abhi
 */
public class Portals extends javax.swing.JFrame {

    /**
     * Creates new form Portals
     */
    public Portals() {
        initComponents();
    }

    /**
     * This method is called from within the constructor to initialize the form.
     * WARNING: Do NOT modify this code. The content of this method is always
     * regenerated by the Form Editor.
     */
    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        university = new javax.swing.JButton();
        student = new javax.swing.JButton();
        college = new javax.swing.JButton();
        exit = new javax.swing.JButton();
        portal = new javax.swing.JLabel();

        setDefaultCloseOperation(javax.swing.WindowConstants.EXIT_ON_CLOSE);
        setTitle("Portals");

        university.setFont(new java.awt.Font("Ubuntu Mono", 1, 36)); // NOI18N
        university.setForeground(new java.awt.Color(26, 198, 254));
        university.setMnemonic('D');
        university.setText("DEPARTMENT");
        university.setBorder(javax.swing.BorderFactory.createEtchedBorder(java.awt.Color.cyan, java.awt.Color.cyan));
        university.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                universityActionPerformed(evt);
            }
        });

        student.setFont(new java.awt.Font("Ubuntu Mono", 1, 36)); // NOI18N
        student.setForeground(new java.awt.Color(26, 198, 254));
        student.setMnemonic('S');
        student.setText("STUDENT");
        student.setBorder(javax.swing.BorderFactory.createEtchedBorder(java.awt.Color.cyan, java.awt.Color.cyan));
        student.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                studentActionPerformed(evt);
            }
        });

        college.setFont(new java.awt.Font("Ubuntu Mono", 1, 36)); // NOI18N
        college.setForeground(new java.awt.Color(26, 198, 254));
        college.setMnemonic('I');
        college.setText("INSTRUCTOR");
        college.setBorder(javax.swing.BorderFactory.createEtchedBorder(java.awt.Color.cyan, java.awt.Color.cyan));
        college.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                collegeActionPerformed(evt);
            }
        });

        exit.setFont(new java.awt.Font("Ubuntu Mono", 1, 36)); // NOI18N
        exit.setForeground(new java.awt.Color(26, 198, 254));
        exit.setMnemonic('E');
        exit.setText("EXIT");
        exit.setBorder(javax.swing.BorderFactory.createEtchedBorder(java.awt.Color.cyan, java.awt.Color.cyan));
        exit.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                exitActionPerformed(evt);
            }
        });

        portal.setFont(new java.awt.Font("Serif", 1, 48)); // NOI18N
        portal.setForeground(new java.awt.Color(26, 198, 254));
        portal.setHorizontalAlignment(javax.swing.SwingConstants.CENTER);
        portal.setText("Fcrit College");

        javax.swing.GroupLayout layout = new javax.swing.GroupLayout(getContentPane());
        getContentPane().setLayout(layout);
        layout.setHorizontalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addGap(63, 63, 63)
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(layout.createSequentialGroup()
                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING, false)
                            .addComponent(college, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                            .addComponent(university, javax.swing.GroupLayout.DEFAULT_SIZE, 192, Short.MAX_VALUE))
                        .addGap(18, 18, 18)
                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING, false)
                            .addComponent(student, javax.swing.GroupLayout.DEFAULT_SIZE, 203, Short.MAX_VALUE)
                            .addComponent(exit, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)))
                    .addGroup(layout.createSequentialGroup()
                        .addGap(8, 8, 8)
                        .addComponent(portal, javax.swing.GroupLayout.PREFERRED_SIZE, 385, javax.swing.GroupLayout.PREFERRED_SIZE)))
                .addContainerGap(43, Short.MAX_VALUE))
        );
        layout.setVerticalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addGap(21, 21, 21)
                .addComponent(portal, javax.swing.GroupLayout.PREFERRED_SIZE, 71, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addGap(30, 30, 30)
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(university, javax.swing.GroupLayout.PREFERRED_SIZE, 153, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(student, javax.swing.GroupLayout.PREFERRED_SIZE, 153, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addGap(28, 28, 28)
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(college, javax.swing.GroupLayout.PREFERRED_SIZE, 146, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(exit, javax.swing.GroupLayout.PREFERRED_SIZE, 146, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addContainerGap(48, Short.MAX_VALUE))
        );

        pack();
    }// </editor-fold>//GEN-END:initComponents

    private void collegeActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_collegeActionPerformed
        new Instructor().setVisible(true);
        this.setVisible(false);
    }//GEN-LAST:event_collegeActionPerformed

    private void studentActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_studentActionPerformed
        new StudentsForm().setVisible(true);
        this.setVisible(false);
    }//GEN-LAST:event_studentActionPerformed

    private void exitActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_exitActionPerformed
       System.exit(0);
    }//GEN-LAST:event_exitActionPerformed

    private void universityActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_universityActionPerformed
        new Department().setVisible(true);
        this.setVisible(false);
    }//GEN-LAST:event_universityActionPerformed

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
            java.util.logging.Logger.getLogger(Portals.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (InstantiationException ex) {
            java.util.logging.Logger.getLogger(Portals.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (IllegalAccessException ex) {
            java.util.logging.Logger.getLogger(Portals.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (javax.swing.UnsupportedLookAndFeelException ex) {
            java.util.logging.Logger.getLogger(Portals.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        }
        //</editor-fold>

        /* Create and display the form */
        java.awt.EventQueue.invokeLater(new Runnable() {
            public void run() {
                new Portals().setVisible(true);
            }
        });
    }

    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JButton college;
    private javax.swing.JButton exit;
    private javax.swing.JLabel portal;
    private javax.swing.JButton student;
    private javax.swing.JButton university;
    // End of variables declaration//GEN-END:variables
}
