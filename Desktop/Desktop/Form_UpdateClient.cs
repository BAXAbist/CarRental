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
    public partial class Form_UpdateClient : Form
    {
        Form1 parent;
        int id;
        public Form_UpdateClient(Form1 parent,string[] data,int id)
        {
            InitializeComponent();
            this.parent = parent;
            this.id = id;
            textBox1.Text = data[0];
            textBox2.Text = data[1];
            textBox3.Text = data[2];
            textBox4.Text = data[3];
            string[] address = data[4].Split(',');
            textBox5.Text = address[0].Replace("г. ","");
            try
            {
                textBox6.Text = address[1].Replace("ул. ", "");
                try
                {
                    textBox7.Text = address[2].Replace("кв. ", "");
                }
                catch { }
            }
            catch { }
        }

        private void button1_Click(object sender, EventArgs e)
        {
            string address_out = "г. " + textBox5.Text + ", ул. " + textBox6.Text;
            if (textBox7.Text != String.Empty)
                address_out += ", кв. " + textBox7.Text;
            string[] res = { textBox1.Text, textBox2.Text, textBox3.Text,textBox4.Text, address_out};
            parent.UpdateClient(res, id);
            this.Close();
        }
    }
}
