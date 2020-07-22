namespace Desktop
{
    partial class Form1
    {
        /// <summary>
        /// Обязательная переменная конструктора.
        /// </summary>
        private System.ComponentModel.IContainer components = null;

        /// <summary>
        /// Освободить все используемые ресурсы.
        /// </summary>
        /// <param name="disposing">истинно, если управляемый ресурс должен быть удален; иначе ложно.</param>
        protected override void Dispose(bool disposing)
        {
            if (disposing && (components != null))
            {
                components.Dispose();
            }
            base.Dispose(disposing);
        }

        #region Код, автоматически созданный конструктором форм Windows

        /// <summary>
        /// Требуемый метод для поддержки конструктора — не изменяйте 
        /// содержимое этого метода с помощью редактора кода.
        /// </summary>
        private void InitializeComponent()
        {
            this.dataGridView1 = new System.Windows.Forms.DataGridView();
            this.Photo = new System.Windows.Forms.DataGridViewImageColumn();
            this.brand = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.type = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.cost = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.status = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.id_car = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.Button_AddCar = new System.Windows.Forms.Button();
            this.tabControl1 = new System.Windows.Forms.TabControl();
            this.tabPage1 = new System.Windows.Forms.TabPage();
            this.Button_UpdateCar = new System.Windows.Forms.Button();
            this.tabPage2 = new System.Windows.Forms.TabPage();
            this.button_UpdateClient = new System.Windows.Forms.Button();
            this.richTextBox1 = new System.Windows.Forms.RichTextBox();
            this.dataGridView2 = new System.Windows.Forms.DataGridView();
            this.FirstName = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.MiddleName = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.SecondName = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.Phone = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.Address = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.id_client = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.tabPage3 = new System.Windows.Forms.TabPage();
            this.button_Cancel = new System.Windows.Forms.Button();
            this.button_Confirm = new System.Windows.Forms.Button();
            this.dataGridView3 = new System.Windows.Forms.DataGridView();
            this.openFileDialog1 = new System.Windows.Forms.OpenFileDialog();
            this.FirstName_Order = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.SecondName_Order = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.Phone_Order = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.Photo_Order = new System.Windows.Forms.DataGridViewImageColumn();
            this.Brand_Order = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.date_issue = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.Date_return = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.state = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.id_history = new System.Windows.Forms.DataGridViewTextBoxColumn();
            ((System.ComponentModel.ISupportInitialize)(this.dataGridView1)).BeginInit();
            this.tabControl1.SuspendLayout();
            this.tabPage1.SuspendLayout();
            this.tabPage2.SuspendLayout();
            ((System.ComponentModel.ISupportInitialize)(this.dataGridView2)).BeginInit();
            this.tabPage3.SuspendLayout();
            ((System.ComponentModel.ISupportInitialize)(this.dataGridView3)).BeginInit();
            this.SuspendLayout();
            // 
            // dataGridView1
            // 
            this.dataGridView1.AutoSizeColumnsMode = System.Windows.Forms.DataGridViewAutoSizeColumnsMode.Fill;
            this.dataGridView1.AutoSizeRowsMode = System.Windows.Forms.DataGridViewAutoSizeRowsMode.AllCells;
            this.dataGridView1.ColumnHeadersHeightSizeMode = System.Windows.Forms.DataGridViewColumnHeadersHeightSizeMode.AutoSize;
            this.dataGridView1.Columns.AddRange(new System.Windows.Forms.DataGridViewColumn[] {
            this.Photo,
            this.brand,
            this.type,
            this.cost,
            this.status,
            this.id_car});
            this.dataGridView1.Location = new System.Drawing.Point(6, 6);
            this.dataGridView1.Name = "dataGridView1";
            this.dataGridView1.SelectionMode = System.Windows.Forms.DataGridViewSelectionMode.FullRowSelect;
            this.dataGridView1.Size = new System.Drawing.Size(729, 497);
            this.dataGridView1.TabIndex = 0;
            // 
            // Photo
            // 
            this.Photo.HeaderText = "Фото";
            this.Photo.Name = "Photo";
            this.Photo.ReadOnly = true;
            // 
            // brand
            // 
            this.brand.HeaderText = "Марка";
            this.brand.Name = "brand";
            this.brand.ReadOnly = true;
            // 
            // type
            // 
            this.type.HeaderText = "Категория";
            this.type.Name = "type";
            this.type.ReadOnly = true;
            // 
            // cost
            // 
            this.cost.HeaderText = "Стоим-ть";
            this.cost.Name = "cost";
            this.cost.ReadOnly = true;
            // 
            // status
            // 
            this.status.HeaderText = "Статус";
            this.status.Name = "status";
            this.status.ReadOnly = true;
            // 
            // id_car
            // 
            this.id_car.HeaderText = "ID";
            this.id_car.Name = "id_car";
            this.id_car.Visible = false;
            // 
            // Button_AddCar
            // 
            this.Button_AddCar.Location = new System.Drawing.Point(660, 509);
            this.Button_AddCar.Name = "Button_AddCar";
            this.Button_AddCar.Size = new System.Drawing.Size(75, 23);
            this.Button_AddCar.TabIndex = 1;
            this.Button_AddCar.Text = "Добавить";
            this.Button_AddCar.UseVisualStyleBackColor = true;
            this.Button_AddCar.Click += new System.EventHandler(this.Button_AddCar_Click);
            // 
            // tabControl1
            // 
            this.tabControl1.Controls.Add(this.tabPage1);
            this.tabControl1.Controls.Add(this.tabPage2);
            this.tabControl1.Controls.Add(this.tabPage3);
            this.tabControl1.Location = new System.Drawing.Point(12, 12);
            this.tabControl1.Name = "tabControl1";
            this.tabControl1.SelectedIndex = 0;
            this.tabControl1.Size = new System.Drawing.Size(749, 564);
            this.tabControl1.TabIndex = 2;
            // 
            // tabPage1
            // 
            this.tabPage1.Controls.Add(this.Button_UpdateCar);
            this.tabPage1.Controls.Add(this.Button_AddCar);
            this.tabPage1.Controls.Add(this.dataGridView1);
            this.tabPage1.Location = new System.Drawing.Point(4, 22);
            this.tabPage1.Name = "tabPage1";
            this.tabPage1.Padding = new System.Windows.Forms.Padding(3);
            this.tabPage1.Size = new System.Drawing.Size(741, 538);
            this.tabPage1.TabIndex = 0;
            this.tabPage1.Text = "Авто";
            this.tabPage1.UseVisualStyleBackColor = true;
            // 
            // Button_UpdateCar
            // 
            this.Button_UpdateCar.Location = new System.Drawing.Point(579, 509);
            this.Button_UpdateCar.Name = "Button_UpdateCar";
            this.Button_UpdateCar.Size = new System.Drawing.Size(75, 23);
            this.Button_UpdateCar.TabIndex = 3;
            this.Button_UpdateCar.Text = "Изменить";
            this.Button_UpdateCar.UseVisualStyleBackColor = true;
            this.Button_UpdateCar.Click += new System.EventHandler(this.Button_UpdateCar_Click);
            // 
            // tabPage2
            // 
            this.tabPage2.Controls.Add(this.button_UpdateClient);
            this.tabPage2.Controls.Add(this.richTextBox1);
            this.tabPage2.Controls.Add(this.dataGridView2);
            this.tabPage2.Location = new System.Drawing.Point(4, 22);
            this.tabPage2.Name = "tabPage2";
            this.tabPage2.Padding = new System.Windows.Forms.Padding(3);
            this.tabPage2.Size = new System.Drawing.Size(741, 538);
            this.tabPage2.TabIndex = 1;
            this.tabPage2.Text = "Клиенты";
            this.tabPage2.UseVisualStyleBackColor = true;
            // 
            // button_UpdateClient
            // 
            this.button_UpdateClient.Location = new System.Drawing.Point(660, 509);
            this.button_UpdateClient.Name = "button_UpdateClient";
            this.button_UpdateClient.Size = new System.Drawing.Size(75, 23);
            this.button_UpdateClient.TabIndex = 2;
            this.button_UpdateClient.Text = "Изменить";
            this.button_UpdateClient.UseVisualStyleBackColor = true;
            this.button_UpdateClient.Click += new System.EventHandler(this.button_UpdateClient_Click);
            // 
            // richTextBox1
            // 
            this.richTextBox1.Location = new System.Drawing.Point(41, 97);
            this.richTextBox1.Name = "richTextBox1";
            this.richTextBox1.Size = new System.Drawing.Size(351, 280);
            this.richTextBox1.TabIndex = 1;
            this.richTextBox1.Text = "";
            this.richTextBox1.Visible = false;
            // 
            // dataGridView2
            // 
            this.dataGridView2.AutoSizeColumnsMode = System.Windows.Forms.DataGridViewAutoSizeColumnsMode.Fill;
            this.dataGridView2.ColumnHeadersHeightSizeMode = System.Windows.Forms.DataGridViewColumnHeadersHeightSizeMode.AutoSize;
            this.dataGridView2.Columns.AddRange(new System.Windows.Forms.DataGridViewColumn[] {
            this.FirstName,
            this.MiddleName,
            this.SecondName,
            this.Phone,
            this.Address,
            this.id_client});
            this.dataGridView2.Location = new System.Drawing.Point(7, 7);
            this.dataGridView2.Name = "dataGridView2";
            this.dataGridView2.SelectionMode = System.Windows.Forms.DataGridViewSelectionMode.FullRowSelect;
            this.dataGridView2.Size = new System.Drawing.Size(728, 497);
            this.dataGridView2.TabIndex = 0;
            // 
            // FirstName
            // 
            this.FirstName.HeaderText = "Имя";
            this.FirstName.Name = "FirstName";
            this.FirstName.ReadOnly = true;
            // 
            // MiddleName
            // 
            this.MiddleName.HeaderText = "Отчество";
            this.MiddleName.Name = "MiddleName";
            this.MiddleName.ReadOnly = true;
            // 
            // SecondName
            // 
            this.SecondName.HeaderText = "Фамилия";
            this.SecondName.Name = "SecondName";
            this.SecondName.ReadOnly = true;
            // 
            // Phone
            // 
            this.Phone.HeaderText = "Телефон";
            this.Phone.Name = "Phone";
            this.Phone.ReadOnly = true;
            // 
            // Address
            // 
            this.Address.AutoSizeMode = System.Windows.Forms.DataGridViewAutoSizeColumnMode.AllCells;
            this.Address.HeaderText = "Адрес";
            this.Address.Name = "Address";
            this.Address.ReadOnly = true;
            this.Address.Width = 63;
            // 
            // id_client
            // 
            this.id_client.HeaderText = "id";
            this.id_client.Name = "id_client";
            this.id_client.ReadOnly = true;
            this.id_client.Visible = false;
            // 
            // tabPage3
            // 
            this.tabPage3.Controls.Add(this.button_Cancel);
            this.tabPage3.Controls.Add(this.button_Confirm);
            this.tabPage3.Controls.Add(this.dataGridView3);
            this.tabPage3.Location = new System.Drawing.Point(4, 22);
            this.tabPage3.Name = "tabPage3";
            this.tabPage3.Padding = new System.Windows.Forms.Padding(3);
            this.tabPage3.Size = new System.Drawing.Size(741, 538);
            this.tabPage3.TabIndex = 2;
            this.tabPage3.Text = "Текущие заказы";
            this.tabPage3.UseVisualStyleBackColor = true;
            // 
            // button_Cancel
            // 
            this.button_Cancel.Location = new System.Drawing.Point(6, 509);
            this.button_Cancel.Name = "button_Cancel";
            this.button_Cancel.Size = new System.Drawing.Size(126, 23);
            this.button_Cancel.TabIndex = 3;
            this.button_Cancel.Text = "Отмена заказа";
            this.button_Cancel.UseVisualStyleBackColor = true;
            this.button_Cancel.Click += new System.EventHandler(this.button_Cancel_Click);
            // 
            // button_Confirm
            // 
            this.button_Confirm.Location = new System.Drawing.Point(652, 509);
            this.button_Confirm.Name = "button_Confirm";
            this.button_Confirm.Size = new System.Drawing.Size(83, 23);
            this.button_Confirm.TabIndex = 2;
            this.button_Confirm.Text = "Подтвердить";
            this.button_Confirm.UseVisualStyleBackColor = true;
            this.button_Confirm.Click += new System.EventHandler(this.button_Confirm_Click);
            // 
            // dataGridView3
            // 
            this.dataGridView3.AutoSizeColumnsMode = System.Windows.Forms.DataGridViewAutoSizeColumnsMode.Fill;
            this.dataGridView3.AutoSizeRowsMode = System.Windows.Forms.DataGridViewAutoSizeRowsMode.AllCells;
            this.dataGridView3.ColumnHeadersHeightSizeMode = System.Windows.Forms.DataGridViewColumnHeadersHeightSizeMode.AutoSize;
            this.dataGridView3.Columns.AddRange(new System.Windows.Forms.DataGridViewColumn[] {
            this.FirstName_Order,
            this.SecondName_Order,
            this.Phone_Order,
            this.Photo_Order,
            this.Brand_Order,
            this.date_issue,
            this.Date_return,
            this.state,
            this.id_history});
            this.dataGridView3.Location = new System.Drawing.Point(6, 6);
            this.dataGridView3.Name = "dataGridView3";
            this.dataGridView3.SelectionMode = System.Windows.Forms.DataGridViewSelectionMode.FullRowSelect;
            this.dataGridView3.Size = new System.Drawing.Size(729, 497);
            this.dataGridView3.TabIndex = 1;
            // 
            // openFileDialog1
            // 
            this.openFileDialog1.FileName = "openFileDialog1";
            // 
            // FirstName_Order
            // 
            this.FirstName_Order.HeaderText = "Имя";
            this.FirstName_Order.Name = "FirstName_Order";
            this.FirstName_Order.ReadOnly = true;
            // 
            // SecondName_Order
            // 
            this.SecondName_Order.HeaderText = "Фамилия";
            this.SecondName_Order.Name = "SecondName_Order";
            this.SecondName_Order.ReadOnly = true;
            // 
            // Phone_Order
            // 
            this.Phone_Order.HeaderText = "Телефон";
            this.Phone_Order.Name = "Phone_Order";
            this.Phone_Order.ReadOnly = true;
            // 
            // Photo_Order
            // 
            this.Photo_Order.HeaderText = "Фото";
            this.Photo_Order.Name = "Photo_Order";
            this.Photo_Order.ReadOnly = true;
            // 
            // Brand_Order
            // 
            this.Brand_Order.HeaderText = "Марка";
            this.Brand_Order.Name = "Brand_Order";
            this.Brand_Order.ReadOnly = true;
            this.Brand_Order.Resizable = System.Windows.Forms.DataGridViewTriState.True;
            this.Brand_Order.SortMode = System.Windows.Forms.DataGridViewColumnSortMode.NotSortable;
            // 
            // date_issue
            // 
            this.date_issue.HeaderText = "Дата выдачи";
            this.date_issue.Name = "date_issue";
            this.date_issue.ReadOnly = true;
            // 
            // Date_return
            // 
            this.Date_return.HeaderText = "Дата возврата";
            this.Date_return.Name = "Date_return";
            this.Date_return.ReadOnly = true;
            // 
            // state
            // 
            this.state.HeaderText = "Статус";
            this.state.Name = "state";
            this.state.ReadOnly = true;
            // 
            // id_history
            // 
            this.id_history.HeaderText = "id";
            this.id_history.Name = "id_history";
            this.id_history.ReadOnly = true;
            this.id_history.Visible = false;
            // 
            // Form1
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(764, 581);
            this.Controls.Add(this.tabControl1);
            this.Name = "Form1";
            this.Text = "Car4Rent";
            ((System.ComponentModel.ISupportInitialize)(this.dataGridView1)).EndInit();
            this.tabControl1.ResumeLayout(false);
            this.tabPage1.ResumeLayout(false);
            this.tabPage2.ResumeLayout(false);
            ((System.ComponentModel.ISupportInitialize)(this.dataGridView2)).EndInit();
            this.tabPage3.ResumeLayout(false);
            ((System.ComponentModel.ISupportInitialize)(this.dataGridView3)).EndInit();
            this.ResumeLayout(false);

        }

        #endregion

        private System.Windows.Forms.DataGridView dataGridView1;
        private System.Windows.Forms.Button Button_AddCar;
        private System.Windows.Forms.TabControl tabControl1;
        private System.Windows.Forms.TabPage tabPage1;
        private System.Windows.Forms.TabPage tabPage2;
        private System.Windows.Forms.DataGridView dataGridView2;
        private System.Windows.Forms.TabPage tabPage3;
        private System.Windows.Forms.DataGridView dataGridView3;
        private System.Windows.Forms.OpenFileDialog openFileDialog1;
        private System.Windows.Forms.RichTextBox richTextBox1;
        private System.Windows.Forms.Button Button_UpdateCar;
        private System.Windows.Forms.Button button_UpdateClient;
        private System.Windows.Forms.DataGridViewImageColumn Photo;
        private System.Windows.Forms.DataGridViewTextBoxColumn brand;
        private System.Windows.Forms.DataGridViewTextBoxColumn type;
        private System.Windows.Forms.DataGridViewTextBoxColumn cost;
        private System.Windows.Forms.DataGridViewTextBoxColumn status;
        private System.Windows.Forms.DataGridViewTextBoxColumn id_car;
        private System.Windows.Forms.DataGridViewTextBoxColumn FirstName;
        private System.Windows.Forms.DataGridViewTextBoxColumn MiddleName;
        private System.Windows.Forms.DataGridViewTextBoxColumn SecondName;
        private System.Windows.Forms.DataGridViewTextBoxColumn Phone;
        private System.Windows.Forms.DataGridViewTextBoxColumn Address;
        private System.Windows.Forms.DataGridViewTextBoxColumn id_client;
        private System.Windows.Forms.Button button_Cancel;
        private System.Windows.Forms.Button button_Confirm;
        private System.Windows.Forms.DataGridViewTextBoxColumn FirstName_Order;
        private System.Windows.Forms.DataGridViewTextBoxColumn SecondName_Order;
        private System.Windows.Forms.DataGridViewTextBoxColumn Phone_Order;
        private System.Windows.Forms.DataGridViewImageColumn Photo_Order;
        private System.Windows.Forms.DataGridViewTextBoxColumn Brand_Order;
        private System.Windows.Forms.DataGridViewTextBoxColumn date_issue;
        private System.Windows.Forms.DataGridViewTextBoxColumn Date_return;
        private System.Windows.Forms.DataGridViewTextBoxColumn state;
        private System.Windows.Forms.DataGridViewTextBoxColumn id_history;
    }
}

