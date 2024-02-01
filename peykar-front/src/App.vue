<template>
  <router-view />
</template>

<script>
import { defineComponent } from "vue";

export default defineComponent({
  name: "App",
});
</script>

<style>
.br-8 {
  border-radius: 8px;
}

.br-10 {
  border-radius: 10px !important;
}

.q-btn.no-hover:hover {
  animation: none !important;
}
</style>
