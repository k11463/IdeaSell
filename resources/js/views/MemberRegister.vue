<template>
  <div>
    <v-row>
      <v-col lg="2"></v-col>
      <v-col lg="8">
        <v-container>
          <v-row>
            <v-col lg="3"></v-col>
            <v-col lg="6">
              <v-card>
                <v-card-title>Member Register</v-card-title>
                <v-card-text>
                  <v-text-field label="使用者名稱" outlined shaped v-model="form.username"></v-text-field>
                  <v-text-field label="姓名" outlined shaped v-model="form.legal_name"></v-text-field>
                  <v-text-field label="Email" outlined shaped v-model="form.email"></v-text-field>
                  <v-text-field type="password" label="密碼" outlined shaped v-model="form.password"></v-text-field>
                  <v-text-field
                    type="password"
                    label="確認密碼"
                    outlined
                    shaped
                    v-model="confirmPassword"
                  ></v-text-field>
                  <v-text-field label="Brithday" outlined shaped v-model="form.birthday"></v-text-field>
                  <v-text-field label="PhoneNumber" outlined shaped v-model="form.phone"></v-text-field>
                </v-card-text>
                <div class="errormsg" v-if="errors.length > 0">
                  <div v-for="error in errors" :key="error">{{ error[0] }}</div>
                </div>
                <v-card-actions>
                  <v-btn @click="SignUp" :loading="isSend">SignUp</v-btn>
                  <v-spacer></v-spacer>
                  <v-btn>Cancel</v-btn>
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
  data() {
    return {
      form: {
        username: "brian",
        legal_name: "brian",
        email: "k7766134@gmail.com",
        password: "brian",
        birthday: "2019-10-28",
        phone: "0958462485",
        gender: true,
        line_id: "d1s2ad3w12d3"
      },
      confirmPassword: "brian",
      errors: [],
      isSend: false
    };
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
            if (err.response.status == 422) {
              this.isSend = false;
              this.errors = Object.values(err.response.data.errors);
            }
          });
      } else {
        this.errors.push("密碼請一致");
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
