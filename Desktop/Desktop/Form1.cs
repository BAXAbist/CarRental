using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using Newtonsoft.Json;
using System.Threading.Tasks;
using System.Windows.Forms;
using System.Net;
using System.IO;


namespace Desktop
{
    public partial class Form1 : Form
    {
        Form_Add add;
        public string test;

        public Form1()
        {
            //Trust all certificates
            System.Net.ServicePointManager.ServerCertificateValidationCallback =
                ((sender, certificate, chain, sslPolicyErrors) => true);

            InitializeComponent();
            ServerCars();
            ServerClients();
            ServerOrders();
            WebRequest request = (HttpWebRequest)WebRequest.Create("https://www.rentnewcar.ffox.site/api/GetAllClients.php");
            request.Method = "GET";
            WebResponse response = (HttpWebResponse)request.GetResponse();

            //Разберись с json для списка элементов

            StreamReader stream = new StreamReader(response.GetResponseStream(), Encoding.UTF8);
            //string res = stream.ReadToEnd();
            string json = stream.ReadToEnd();
            //json = json.Replace(",[\"ok\"]", "");
            //var clients = JsonConvert.DeserializeObject<Clients>(json);
            //richTextBox1.Text =  richTextBox1.Text+"\n"+clients.id_client;
            //richTextBox1.Text = richTextBox1.Text + "\n" + clients.first_name;
            Console.ReadLine();
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
        //было предложено обновлять в каждый момент времени. Функцию либо изменить либо убрать
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

    class Clients
    {
        public int id_client;
        public string login;
        public string password;
        public string first_name;
        public string second_name;
        public string middle_name;
        public string address;
        public string phone;
    }
}
