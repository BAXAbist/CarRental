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
    public partial class Form_Add : Form
    {
        Form1 parent;
        public Form_Add(Form1 parent)
        {
            this.parent = parent;
            InitializeComponent();
        }

        OpenFileDialog OpenFile = new OpenFileDialog();

        private void button1_Click(object sender, EventArgs e)
        {
            if (OpenFile.ShowDialog() == DialogResult.OK)
            {
                textBox1.Text = OpenFile.FileName;
                string FileName = textBox1.Text;
            }
        }

        private void button2_Click(object sender, EventArgs e)
        {
            string[] res = { textBox2.Text, textBox3.Text, textBox4.Text };
            parent.AddRow(res, textBox1.Text);
            this.Close();
        }
    }
}
