<template>
  <v-app>
    <v-row>
      <v-col lg="2"></v-col>
      <v-col lg="8">
        <v-container>
          <v-row>
            <v-col lg="3"></v-col>
            <v-col lg="6">
              <v-card style="margin-top: 40px;">
                <v-card-title>會員註冊</v-card-title>
                <v-card-text>
                  <v-text-field
                    label="使用者名稱"
                    placeholder="輸入1~12個英文"
                    outlined
                    shaped
                    v-model="form.username"
                  ></v-text-field>
                  <v-text-field
                    label="姓名"
                    placeholder="輸入1~6個中文或1~12個英文"
                    outlined
                    shaped
                    v-model="form.realname"
                  ></v-text-field>
                  <v-text-field
                    label="Email"
                    placeholder="輸入信箱"
                    outlined
                    shaped
                    v-model="form.email"
                  ></v-text-field>
                  <v-text-field
                    type="password"
                    placeholder="輸入6~12個英文"
                    label="密碼"
                    outlined
                    shaped
                    v-model="form.password"
                  ></v-text-field>
                  <v-text-field
                    type="password"
                    placeholder="再輸入一次密碼"
                    label="確認密碼"
                    outlined
                    shaped
                    v-model="confirmPassword"
                  ></v-text-field>
                  <v-text-field
                    label="手機號碼"
                    placeholder="輸入你的手機號碼"
                    outlined
                    shaped
                    v-model="form.phone"
                  ></v-text-field>
                  <v-text-field
                    append-icon="mdi-calendar-range"
                    outlined
                    shaped
                    label="生日"
                    placeholder="請點選右邊圖示選擇日期"
                    type="text"
                    @click:append="dateDialog = true"
                    readonly
                    v-model="form.birthday"
                  ></v-text-field>
                </v-card-text>
                <v-card-actions>
                  <v-btn @click="SignUp" :loading="isSend">註冊</v-btn>
                  <v-spacer></v-spacer>
                  <v-btn @click="$router.go(-1);">回上一頁</v-btn>
                </v-card-actions>
              </v-card>
            </v-col>
            <v-col lg="3"></v-col>
          </v-row>
        </v-container>
      </v-col>
      <v-col lg="2"></v-col>
    </v-row>

    <v-dialog v-model="dateDialog" max-width="290">
      <v-card>
        <v-card-title class="headline">選擇生日</v-card-title>
        <v-date-picker
          v-model="date"
          year-icon="mdi-calendar-blank"
          prev-icon="mdi-skip-previous"
          next-icon="mdi-skip-next"
          color="orange lighten-3"
        ></v-date-picker>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn color="green darken-1" text @click="dateDialog = false">確定</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>

    <v-dialog v-model="errorDialog" max-width="290">
      <v-card>
        <v-card-title class="headline">錯誤</v-card-title>
        <v-card-text v-for="(error, id) in errors" :key="id" style="color: red">{{ error[0] }}</v-card-text>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn color="green darken-1" text @click="errorDialog = false">確定</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </v-app>
</template>

<script>
export default {
  data() {
    return {
      form: {
        username: "",
        realname: "",
        email: "",
        password: "",
        birthday: "",
        phone: ""
      },
      confirmPassword: "",
      errors: [],
      isSend: false,
      dateDialog: false,
      date: new Date().toISOString().substr(0, 10),
      errorDialog: false
    };
  },
  watch: {
    date() {
      this.form.birthday = this.date;
    }
  },
  methods: {
    SignUp() {
      this.errors = [];
      if (this.confirmPassword == this.form.password) {
        this.isSend = true;
        axios
          .post("/signup", this.form)
          .then(res => {
            alert("註冊成功");
            this.$router.push("/login");
          })
          .catch(err => {
            this.isSend = false;
            if (err.response.status == 422) {
              this.errors = Object.values(err.response.data.errors);
              this.errorDialog = true;
            }
          });
      } else {
        this.errors.push("密碼請一致");
        this.errorDialog = true;
      }
    }
  }
};
</script>

<style lang="scss" scoped>
.errormsg {
  color: rgb(247, 71, 71);
  font-size: 16px;
  font-weight: bold;
  display: flex;
  align-items: center;
  justify-content: center;
}
</style>
