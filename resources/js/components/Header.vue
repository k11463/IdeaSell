<template>
  <div>
    <v-toolbar>
      <div class="title" @click="$router.push('/');">
        <v-img src="/img/title.png" max-width="60"></v-img>
        <v-toolbar-title>麥點子</v-toolbar-title>
      </div>
      <v-spacer></v-spacer>
      <v-toolbar-items>
        <v-btn to="/register" class="btn" text>註冊</v-btn>
        <v-btn to="/login" class="btn" text>登入</v-btn>
      </v-toolbar-items>
    </v-toolbar>
  </div>
</template>

<script>
export default {};
</script>

<style lang="scss" scoped>
.btn {
  color: rgb(236, 184, 104);
  font-size: 16px;
}
.title {
  color: rgb(199, 157, 93);
  letter-spacing: 4px;
  height: 100%;
  display: flex;
  align-items: center;
  font-weight: bold;
  margin-left: 20px;
  cursor: pointer;
}
</style>
