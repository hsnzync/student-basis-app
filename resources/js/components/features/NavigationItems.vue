<template>
  <ul class="nav-items">
    <li class="py-1">
      <router-link
        to="/dashboard"
        class="nav-content-item"
        :class="{ 'is-active': selected == 'dashboard' }"
        @click.native="toggleActive('dashboard')"
      >
        <i class="fas fa-columns"></i>
        {{ textContent.navigation.dashboard }}
      </router-link>
    </li>

    <li class="py-1">
      <router-link
        to="/browse"
        class="nav-content-item"
        :class="{ 'is-active': selected == 'browse' }"
        @click.native="toggleActive('browse')"
      >
        <i class="far fa-folder"></i>
        {{ textContent.navigation.browse }}
      </router-link>
    </li>

    <li class="py-1">
      <a href="#community" class="nav-content-item">
        <i class="far fa-comments pr-3"></i>
        {{ textContent.navigation.community }}
      </a>
    </li>

    <li class="py-1">
      <a href="#rankings" class="nav-content-item">
        <i class="fas fa-star pr-3"></i>
        {{ textContent.navigation.rankings }}
      </a>
    </li>

    <li class="py-1">
      <a href="#settings" class="nav-content-item">
        <i class="fas fa-cog pr-3"></i>
        {{ textContent.navigation.settings }}
      </a>
    </li>
  </ul>
</template>

<script>
import { content } from '../../labels/content'

export default {
  name: 'NavigationItems',
  data() {
    return {
      textContent: content,
      selected: 'dashboard'
    }
  },
  methods: {
    toggleActive(item) {
      this.selected = item
    }
  }
}
</script>

<style></style>
