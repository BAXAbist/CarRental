using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace Desktop
{
    public partial class Form1 : Form
    {
        Form_Add add;
        public string[] res;
        public Form1()
        {
            InitializeComponent();
        }

        public void AddRow(string[] row, string imgpath)
        {
            Bitmap i = new Bitmap(Image.FromFile(imgpath),200,100);            
            dataGridView1.Rows.Add(i,row[0],row[2],row[1]);
        }

        private void Button_AddCar_Click(object sender, EventArgs e)
        {
            if (add == null || add.IsDisposed)
            {
                add = new Form_Add(this);
            }
            add.Show();
        }
    }
}
