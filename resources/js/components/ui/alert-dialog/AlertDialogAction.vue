<script setup lang="ts">
import { cn } from '@/lib/utils'
import { buttonVariants } from '@/components/ui/button'
import { AlertDialogAction, type AlertDialogActionProps } from 'reka-ui'
import { computed, type HTMLAttributes } from 'vue'

const props = defineProps<AlertDialogActionProps & {
    class?: HTMLAttributes['class']
    variant?: buttonVariants
}>()

const delegatedProps = computed(() => {
  const { class: _, ...delegated } = props

  return delegated
})
</script>

<template>
  <AlertDialogAction v-bind="delegatedProps" :class="cn(buttonVariants({ variant: props.variant }), props.class)">
    <slot />
  </AlertDialogAction>
</template>
