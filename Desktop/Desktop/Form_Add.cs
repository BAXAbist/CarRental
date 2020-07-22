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
        bool update = false;
        Form1 parent;
        int id;
        public Form_Add(Form1 parent)
        {
            this.parent = parent;
            InitializeComponent();
        }

        public Form_Add(Form1 parent, string[] datacar, Bitmap i, int id)
        {
            InitializeComponent();
            this.parent = parent;
            update = true;
            this.id = id;
            textBox2.Text = datacar[0];
            textBox3.Text = datacar[2];
            textBox4.Text = datacar[1];
            pictureBox1.Image = i;
            this.Text = "Изменить Авто";
            button2.Text = "Изменить";
        }

        OpenFileDialog OpenFile = new OpenFileDialog();

        private void button1_Click(object sender, EventArgs e)
        {
            if (OpenFile.ShowDialog() == DialogResult.OK)
            {
                textBox1.Text = OpenFile.FileName;
                string FileName = textBox1.Text;
                Bitmap i = new Bitmap(Image.FromFile(FileName), 200, 100);
                pictureBox1.Image = i;
            }
        }

        private void button2_Click(object sender, EventArgs e)
        {
            string[] res = { textBox2.Text, textBox3.Text, textBox4.Text };
            if (update)
            {
                parent.UpdateCar(res, textBox1.Text, id);
                update = false;
            }
            else
                parent.AddNewCar(res, textBox1.Text);
            this.Close();
        }
    }
}
