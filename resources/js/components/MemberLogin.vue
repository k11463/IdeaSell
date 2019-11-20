<template>
  <v-app>
    <v-row>
      <v-col lg="2"></v-col>
      <v-col lg="8">
        <v-container>
          <v-row>
            <v-col lg="3"></v-col>
            <v-col class="middle" lg="6">
              <v-card>
                <v-card-title>會員登入</v-card-title>
                <v-card-text>
                  <v-text-field
                    label="帳號"
                    placeholder="輸入Email或使用者名稱"
                    outlined
                    shaped
                    v-model="form.account"
                  ></v-text-field>
                  <v-text-field
                    type="password"
                    label="密碼"
                    placeholder="輸入密碼"
                    outlined
                    shaped
                    v-model="form.password"
                  ></v-text-field>
                </v-card-text>
                <v-card-actions>
                  <v-btn @click="Login" :loading="isSend">登入</v-btn>
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
        account: "",
        password: ""
      },
      errors: [],
      isSend: false,
      errorDialog: false
    };
  },
  methods: {
    Login() {
      this.isSend = true;
      axios
        .post("/login", this.form)
        .then(res => {
          console.log(res);
        })
        .catch(err => {
          this.isSend = false;
          if (err.response.status == 422) {
            this.errors = Object.values(err.response.data.errors);
            this.errorDialog = true;
            // console.log(this.errors);
          }
        });
    }
  }
};
</script>

<style lang="scss" scoped>
.middle {
  margin-top: 16%;
}
</style>
