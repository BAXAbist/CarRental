using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using Newtonsoft.Json;
using Newtonsoft.Json.Linq;
using System.Threading.Tasks;
using System.Windows.Forms;
using System.Net;
using System.IO;

//План задач
//загрузка картинок с сервера +
//добавить кнопки update клиента
//добавить завершить или отменить заказ
//создать таблицу заказов по id 
//загрузка картинок на хостинг
//выгрузка на сервер данных

namespace Desktop
{
    public partial class Form1 : Form
    {
        Form_Add add;
        int id_car1;

        public Form1()
        {
            //Trust all certificates
            System.Net.ServicePointManager.ServerCertificateValidationCallback =
                ((sender, certificate, chain, sslPolicyErrors) => true);

            InitializeComponent();
            ServerCars();
            ServerOrders();
            ServerClients();
            Console.ReadLine();
        }

        public void AddNewCar(string[] row, string imgpath)
        {

            Bitmap i = new Bitmap(Image.FromFile(imgpath),200,100);
            if (dataGridView1.RowCount > 1)
                id_car1 = Convert.ToInt32(dataGridView1[dataGridView1.ColumnCount - 1, dataGridView1.RowCount-2].Value);
            else
                id_car1 = 0;
            id_car1++;
            dataGridView1.Rows.Add(i,row[0],row[2],row[1], id_car1);
        }

        private void Button_AddCar_Click(object sender, EventArgs e)
        {
            if (add == null || add.IsDisposed)
            {
                add = new Form_Add(this);
            }
            add.Show();
        }

        public void UpdateCar(string[] row, string imgpath, int id)
        {

            for(int i=0;i<dataGridView1.RowCount;i++)
            {
                if (id == Convert.ToInt32(dataGridView1[dataGridView1.ColumnCount - 1, i].Value))
                {
                    if (imgpath != "")
                    {
                        Bitmap img = new Bitmap(Image.FromFile(imgpath), 200, 100);
                        dataGridView1[0, i].Value = img;
                    }
                    dataGridView1[1, i].Value = row[0];
                    dataGridView1[2, i].Value = row[2];
                    dataGridView1[3, i].Value = row[1];
                }
            }
        }

        private void Button_UpdateCar_Click(object sender, EventArgs e)
        {
            Int32 selectedCellCount =
        dataGridView1.GetCellCount(DataGridViewElementStates.Selected);
            if (selectedCellCount > 1)
            {
                string[] data = { dataGridView1.SelectedCells[1].Value.ToString(),
                    dataGridView1.SelectedCells[2].Value.ToString(), dataGridView1.SelectedCells[3].Value.ToString() };
                if (add == null || add.IsDisposed)
                {
                    add = new Form_Add(this, data, (Bitmap)dataGridView1.SelectedCells[0].Value, Convert.ToInt32(dataGridView1.SelectedCells[4].Value));
                }
            }
            add.Show();
        }

        private void Button_DelCar_Click(object sender, EventArgs e)
        {

        }

        private void ServerCars()
        {
            WebRequest request = (HttpWebRequest)WebRequest.Create("https://www.rentnewcar.ffox.site/api/GetAllCars.php");
            request.Method = "GET";
            WebResponse response = (HttpWebResponse)request.GetResponse();
            StreamReader stream = new StreamReader(response.GetResponseStream(), Encoding.UTF8);
            string json = stream.ReadToEnd();
            json = json.Replace(",[\"ok\"]", "");
            richTextBox1.Text = json;
            var jArray = (JArray)JsonConvert.DeserializeObject(json);
            var cars = jArray.ToObject<List<Cars>>();
            WebClient web = new WebClient();
            foreach(var i in cars)
            {
                Stream strim = web.OpenRead("https://www.rentnewcar.ffox.site/" + i.icon);
                Bitmap img = new Bitmap(strim);
                img = new Bitmap(img, new Size(200, 100));
                dataGridView1.Rows.Add(img,i.brand,i.type,i.cost,i.id_car);
            }
        }

        private void ServerClients()
        {
            WebRequest request = (HttpWebRequest)WebRequest.Create("https://www.rentnewcar.ffox.site/api/GetAllClients.php");
            request.Method = "GET";
            WebResponse response = (HttpWebResponse)request.GetResponse();
            StreamReader stream = new StreamReader(response.GetResponseStream(), Encoding.UTF8);
            string json = stream.ReadToEnd();
            json = json.Replace(",[\"ok\"]", "");
            var jArray = (JArray)JsonConvert.DeserializeObject(json);
            var clients = jArray.ToObject<List<Clients>>();
            foreach (var i in clients)
            {
                dataGridView2.Rows.Add(i.first_name, i.middle_name, i.second_name, i.phone, i.address,i.id_client);
            }
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

    class Cars
    {
        public int id_car;
        public string brand;
        public string cost;
        public string type;
        public string icon;
    }
}
