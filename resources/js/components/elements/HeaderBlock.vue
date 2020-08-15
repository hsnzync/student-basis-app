<template>
  <div class="header-block my-4 p-5">
    <header-title :title="textContent.status.welcome" color>
      {{ greeting }}
    </header-title>
    <!-- <simple-text /> -->
    Je hebt 80% van alle vakken afgerond Ga zo door en verbeter je resultaten!
  </div>
</template>

<script>
import HeaderTitle from './HeaderTitle'
import SimpleText from './SimpleText'

export default {
  name: 'HeaderBlock',
  components: { HeaderTitle, SimpleText },
  inject: ['textContent', 'user', 'subjects'],
  computed: {
    greeting() {
      return `${this.user.first_name}!`
    }
  }
}
</script>
