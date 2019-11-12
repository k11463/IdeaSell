<template>
  <div>
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
                    v-model="form.email"
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
                <div class="errormsg" v-if="errors.length > 0">
                  <div v-for="error in errors" :key="error">{{ error[0] }}</div>
                </div>
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
  </div>
</template>

<script>
export default {
  mounted() {
    console.log("Component mounted.");
  },
  data() {
    return {
      form: {
        email: "",
        password: ""
      },
      errors: [],
      isSend: false
    };
  },
  methods: {
    Login() {
      axios
        .post("/login", this.form)
        .then(res => {
          console.log(res);
        })
        .catch(err => {
          if (err.response.status == 422) {
            this.isSend = false;
            this.errors = Object.values(err.response.data.errors);
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
