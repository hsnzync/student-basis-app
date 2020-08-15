<template>
  <div class="row m-0">
    <standard-section :type="'dashboard'" :size="'9'">
      <header-title :title="textContent.page.title.dashboard" />
      <header-block />
    </standard-section>

    <standard-section :type="'profile'" :size="'3'">
      <header-title :title="textContent.page.title.profile" />
    </standard-section>
  </div>
</template>

<script>
import { HeaderTitle, HeaderBlock } from '../elements'
import { StandardSection } from '../sections'

export default {
  name: 'Dashboard',
  components: { HeaderTitle, HeaderBlock, StandardSection },
  inject: ['textContent'],
  props: {
    subjects: {
      type: Object,
      required: false,
      default: () => {}
    }
  },
  provide() {
    return {
      subjects: this.subjects
    }
  }
}
</script>
