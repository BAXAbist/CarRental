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


        public Form1()
        {
            InitializeComponent();
            ServerCars();
            ServerClients();
            ServerOrders();
        }

        public void AddNewCar(string[] row, string imgpath)
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

        private void Button_DelCar_Click(object sender, EventArgs e)
        {

        }

        private void ServerCars()
        {
            //Загрузить список авто
        }

        private void ServerClients()
        {
            //Загрузить список клиентов
        }

        private void ServerOrders()
        {
            //Загрузить текущие заказы
        }

        private void LoadToServer(object sender, FormClosingEventArgs e)
        {
            //При закрытие формы, список новых авто отправить на сервер
            //а утилизированные авто обновить по индексу в утиль
        }

        OpenFileDialog OpenFile = new OpenFileDialog();

        private void dataGridView1_CellClick(object sender, DataGridViewCellEventArgs e)
        {
            if (e.RowIndex > 0)
                if (dataGridView1[e.ColumnIndex, e.RowIndex].Value is Bitmap)
                {
                    if (OpenFile.ShowDialog() == DialogResult.OK)
                    {
                        Bitmap i = new Bitmap(Image.FromFile(OpenFile.FileName), 200, 100);
                        dataGridView1[e.ColumnIndex, e.RowIndex].Value = i;
                    }
                }
        }
    }
}
