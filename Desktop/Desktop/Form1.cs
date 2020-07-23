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
using System.Net.Http;
using System.Net.Http.Headers;
using System.IO;

//План задач
//загрузка картинок с сервера +
//добавить кнопки update клиента +
//добавить завершить или отменить заказ +
//создать таблицу заказов по id  +
//загрузка картинок на хостинг
//выгрузка на сервер данных +

namespace Desktop
{
    public partial class Form1 : Form
    {
        Form_Add add;
        Form_UpdateClient updateClient;
        WebClient web = new WebClient();
        int id_car1;

        public Form1()
        {
            //Trust all certificates
            System.Net.ServicePointManager.ServerCertificateValidationCallback =
                ((sender, certificate, chain, sslPolicyErrors) => true);

            InitializeComponent();
            ServerCars();
            ServerClients();
            ServerOrders();
            Console.ReadLine();
        }

        public void AddNewCar(string[] row, string imgpath)
        {

            Bitmap i = new Bitmap(Image.FromFile(imgpath), 200, 100);
            if (dataGridView1.RowCount > 1)
                id_car1 = Convert.ToInt32(dataGridView1[dataGridView1.ColumnCount - 1, dataGridView1.RowCount - 2].Value);
            else
                id_car1 = 0;
            id_car1++;
            dataGridView1.Rows.Add(i, row[0], row[2], row[1], "active", id_car1);
            //web.UploadFile("https://www.rentnewcar.ffox.site/api/GetAllCars.php", "VAZ.jpg");
            //var imgconv = new ImageConverter();
            //var bite = (byte[])imgconv.ConvertTo(i, typeof(byte[]));
            //WebRequest request = (HttpWebRequest)WebRequest.Create("https://www.rentnewcar.ffox.site/api/GetAllCars.php");
            //request.Method = "POST";
            //string sName = "icon=";
            //byte[] byteArray = System.Text.Encoding.UTF8.GetBytes(sName);
            //byteArray

            
            WebRequest request = (HttpWebRequest)WebRequest.Create("https://www.rentnewcar.ffox.site/api/AddCar.php");
            request.Method = "POST";
            string sName = "brand=" + row[0] + "&cost=" + row[1] + "&type=" + row[2] + "&icon=image/No_image.jpg" + "&status=active" + "&passengers=1" + "&bags=1" + "&doors=1";
            byte[] byteArray = System.Text.Encoding.UTF8.GetBytes(sName);
            request.ContentType = "application/x-www-form-urlencoded";
            request.ContentLength = byteArray.Length;
            using (Stream dataStream = request.GetRequestStream())
            {
                dataStream.Write(byteArray, 0, byteArray.Length);
            }

            WebResponse response = (HttpWebResponse)request.GetResponse();
            StreamReader stream = new StreamReader(response.GetResponseStream(), Encoding.UTF8);
            string json = stream.ReadToEnd();
        }

        public async Task<HttpResponseMessage> UploadImage(string url, byte[] ImageData)
        {
            HttpClient client = new HttpClient();
            var requestContent = new MultipartFormDataContent();
            var imageContent = new ByteArrayContent(ImageData);
            imageContent.Headers.ContentType =
                MediaTypeHeaderValue.Parse("image/jpeg");

            requestContent.Add(imageContent, "image", "VAZ.jpg");

            return await client.PostAsync(url, requestContent);
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

            for(int i=0;i<dataGridView1.RowCount-1;i++)
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
                    dataGridView1[4, i].Value = row[3];
                }
            }

            WebRequest request = (HttpWebRequest)WebRequest.Create("https://www.rentnewcar.ffox.site/api/Car_update.php");
            request.Method = "POST";
            string sName = "id_car="+id+"&brand=" + row[0] + "&cost=" + row[1] + "&type="+ row[2] + "&status="+row[3];
            byte[] byteArray = System.Text.Encoding.UTF8.GetBytes(sName);
            request.ContentType = "application/x-www-form-urlencoded";
            request.ContentLength = byteArray.Length;

            using (Stream dataStream = request.GetRequestStream())
            {
                dataStream.Write(byteArray, 0, byteArray.Length);
            }
        }

        private void Button_UpdateCar_Click(object sender, EventArgs e)
        {
            Int32 selectedCellCount =
        dataGridView1.GetCellCount(DataGridViewElementStates.Selected);
            if (selectedCellCount > 1)
            {
                string[] data = { dataGridView1.SelectedCells[1].Value.ToString(),
                    dataGridView1.SelectedCells[2].Value.ToString(), dataGridView1.SelectedCells[3].Value.ToString(), dataGridView1.SelectedCells[4].Value.ToString() };
                if (add == null || add.IsDisposed)
                {
                    add = new Form_Add(this, data, (Bitmap)dataGridView1.SelectedCells[0].Value, Convert.ToInt32(dataGridView1.SelectedCells[5].Value));
                }
                add.Show();
            }
        }

        private void ServerCars()
        {
            WebRequest request = (HttpWebRequest)WebRequest.Create("https://www.rentnewcar.ffox.site/api/GetAllCars.php");
            request.Method = "GET";
            WebResponse response = (HttpWebResponse)request.GetResponse();
            StreamReader stream = new StreamReader(response.GetResponseStream(), Encoding.UTF8);
            string json = stream.ReadToEnd();
            json = json.Replace(",[\"ok\"]", "");
            var jArray = (JArray)JsonConvert.DeserializeObject(json);
            var cars = jArray.ToObject<List<Cars>>();
            foreach(var i in cars)
            {
                Stream strim = web.OpenRead("https://www.rentnewcar.ffox.site/" + i.icon);
                Bitmap img = new Bitmap(strim);
                img = new Bitmap(img, new Size(200, 100));
                dataGridView1.Rows.Add(img,i.brand,i.type,i.cost,i.status,i.id_car);
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
            this.dataGridView3.DefaultCellStyle.WrapMode = DataGridViewTriState.True;
            WebRequest request = (HttpWebRequest)WebRequest.Create("https://www.rentnewcar.ffox.site/api/GetAllHistory.php");
            request.Method = "GET";
            WebResponse response = (HttpWebResponse)request.GetResponse();
            StreamReader stream = new StreamReader(response.GetResponseStream(), Encoding.UTF8);
            string json = stream.ReadToEnd();
            json = json.Replace(",[\"ok\"]", "");
            var jArray = (JArray)JsonConvert.DeserializeObject(json);
            var history = jArray.ToObject<List<History>>();
            DateTime dateissue;
            DateTime datereturn;
            TimeSpan time;
            double ticks;
            foreach (var i in history)
            {
                for (int j = 0; j < dataGridView1.RowCount - 1; j++)
                {
                    if (i.id_car == Convert.ToInt32(dataGridView1[dataGridView1.ColumnCount - 1, j].Value))
                    {
                        for (int k = 0; k < dataGridView2.RowCount - 1; k++)
                        {
                            if (i.id_client == Convert.ToInt32(dataGridView2[dataGridView2.ColumnCount - 1, k].Value))
                            {
                                Bitmap img = (Bitmap)dataGridView1[0,j].Value;
                                img = new Bitmap(img, new Size(200, 100));
                                ticks = double.Parse(i.date_issue);
                                time = TimeSpan.FromMilliseconds(ticks);
                                dateissue = new DateTime(1970, 1, 1) + time;

                                ticks = double.Parse(i.date_issue);
                                time = TimeSpan.FromMilliseconds(ticks);
                                datereturn = new DateTime(1970, 1, 1) + time;
                                dataGridView3.Rows.Add(dataGridView2[0, k].Value, dataGridView2[2, k].Value, dataGridView2[3, k].Value,
                                    img, dataGridView1[1, j].Value, dateissue.Date.ToString("d"), datereturn.Date.ToString("d"), i.state, i.id_history);
                            }
                        }
                    }
                }
            }
            
        }

        public void UpdateClient(string[] row, int id)
        {
            for (int i = 0; i < dataGridView2.RowCount - 1; i++)
            {
                if (id == Convert.ToInt32(dataGridView2[dataGridView2.ColumnCount - 1, i].Value))
                {
                    dataGridView2[0, i].Value = row[0];
                    dataGridView2[1, i].Value = row[1];
                    dataGridView2[2, i].Value = row[2];
                    dataGridView2[3, i].Value = row[3];
                    dataGridView2[4, i].Value = row[4];
                }
            }

            WebRequest request = (HttpWebRequest)WebRequest.Create("https://www.rentnewcar.ffox.site/api/Cl_update.php");
            request.Method = "POST";
            string sName = "id_client=" + id + "&first_name=" + row[0] + "&middle_name=" + row[1] + "&second_name=" + row[2]+ "&phone=" + row[3] + "&address=" + row[4];
            byte[] byteArray = System.Text.Encoding.UTF8.GetBytes(sName);
            request.ContentType = "application/x-www-form-urlencoded";
            request.ContentLength = byteArray.Length;

            using (Stream dataStream = request.GetRequestStream())
            {
                dataStream.Write(byteArray, 0, byteArray.Length);
            }
        }

        private void button_UpdateClient_Click(object sender, EventArgs e)
        {
            Int32 selectedCellCount =
        dataGridView2.GetCellCount(DataGridViewElementStates.Selected);
            if (selectedCellCount > 1)
            {
                string[] data = { dataGridView2.SelectedCells[0].Value.ToString(), dataGridView2.SelectedCells[1].Value.ToString(),
                    dataGridView2.SelectedCells[2].Value.ToString(),dataGridView2.SelectedCells[3].Value.ToString(),
                    dataGridView2.SelectedCells[4].Value.ToString()};
                if (updateClient == null || updateClient.IsDisposed)
                {
                    updateClient = new Form_UpdateClient(this, data, Convert.ToInt32(dataGridView2.SelectedCells[5].Value));
                }
                updateClient.Show();
            }
        }

        private void button_Confirm_Click(object sender, EventArgs e)
        {
            if (dataGridView3.SelectedCells[7].Value.ToString() == "active")
            {
                dataGridView3.SelectedCells[7].Value = "close";
                upload_status_order(Convert.ToInt32(dataGridView3.SelectedCells[8].Value),"close");
            }
        }

        private void button_Cancel_Click(object sender, EventArgs e)
        {
            if (dataGridView3.SelectedCells[7].Value.ToString() == "active")
            {
                dataGridView3.SelectedCells[7].Value = "cancel";
                upload_status_order(Convert.ToInt32(dataGridView3.SelectedCells[8].Value),"cancel");
            }
        }

        private void upload_status_order(int id, string status)
        {
            WebRequest request = (HttpWebRequest)WebRequest.Create("https://www.rentnewcar.ffox.site/api/History_update.php");
            request.Method = "POST";
            string sName = "id_history=" + id + "&state=" + status;
            byte[] byteArray = System.Text.Encoding.UTF8.GetBytes(sName);
            request.ContentType = "application/x-www-form-urlencoded";
            request.ContentLength = byteArray.Length;

            using (Stream dataStream = request.GetRequestStream())
            {
                dataStream.Write(byteArray, 0, byteArray.Length);
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
        public string status;
    }

    class History
    {
        public int id_history;
        public int id_client;
        public int id_car;
        public string date_issue;
        public string date_return;
        public string state;
    }
}
