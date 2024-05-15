<template>
  <q-list bordered class="background border-18 q-my-md">
    <q-expansion-item
      expand-separator
      hide-expand-icon
      icon="question_mark"
      :label="question"
    >
      <q-card class="background border-18-bottom">
        <q-separator color="white" />

        <q-card-section>
          {{ answer }}
        </q-card-section>
      </q-card>
    </q-expansion-item>
  </q-list>
</template>

<script>
export default {
  props: {
    question: {
      type: String,
      required: true,
    },
    answer: {
      type: String,
      required: true,
    },
  },
};
</script>

<style scoped>
.background {
  background-color: #ffffff1a !important;
}

.border-18 {
  border-radius: 18.5px;
}

.border-18-bottom {
  border-bottom-left-radius: 18.5px;
  border-bottom-right-radius: 18.5px;
}
</style>
