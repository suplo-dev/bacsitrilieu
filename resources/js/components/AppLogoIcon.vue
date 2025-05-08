<script setup lang="ts">
import type { HTMLAttributes } from 'vue';

defineOptions({
    inheritAttrs: false,
});

interface Props {
    className?: HTMLAttributes['class'];
}

defineProps<Props>();
</script>

<template>
    <div class="bg-primary">
        <img src="storage/static/logo.png" :class="className" v-bind="$attrs" />
    </div>
</template>
