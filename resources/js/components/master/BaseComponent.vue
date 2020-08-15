<template>
  <div class="vue-base">
    <router-view />
    <!-- <slot /> -->
  </div>
</template>

<script>
import { content } from '../../labels/content'

export default {
  name: 'BaseComponent',
  props: {
    initial: {
      type: Object,
      required: false,
      default: () => {}
    },
    user: {
      type: Object,
      required: false,
      default: () => {}
    }
  },
  provide() {
    return {
      initial: this.initial,
      user: this.user,
      textContent: content
    }
  }
}
</script>
