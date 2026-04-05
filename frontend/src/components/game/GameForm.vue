<script setup lang="ts">
    import { Field, Form, ErrorMessage, defineRule } from 'vee-validate'
    import { required, min, min_value } from '@vee-validate/rules'
    import type { Game } from '@/types/game'
    import FormLabel from '@/components/FormLabel.vue'

    defineRule('required', required)
    defineRule('min', min)
    defineRule('min_value', min_value)

    const emit = defineEmits<{
        (e: 'submit', game: Game): void
    }>()

    const { initValues } = defineProps<{
        initValues: Game
    }>()

    const handleSubmit = (values: Game) => {
        emit('submit', values)
    }
</script>

<template>
  <Form
    :initial-values="initValues"
    @submit="handleSubmit as any"
    class="space-y-4"
  >
    <fieldset class="fieldset bg-base-100 border border-base-300 p-4 rounded-box">
      <legend class="fieldset-legend">Game Form</legend>

      <!-- Title -->
      <div class="form-control">
        <FormLabel html-for="title" :is-required="true">
          Title
        </FormLabel>

        <Field
          id="title"
          name="title"
          type="text"
          rules="required|min:3"
          v-slot="{ field, errors }"
        >
          <input
            v-bind="field"
            class="input input-bordered w-full"
            :class="{ 'input-error': errors.length }"
          />
        </Field>

        <ErrorMessage
          name="title"
          as="span"
          class="text-error text-sm"
        />
      </div>

      <!-- Platform -->
      <div class="form-control">
        <FormLabel html-for="platform_id" :is-required="true">
          Platform
        </FormLabel>

        <Field
          id="platform_id"
          name="platform_id"
          type="number"
          rules="required|min_value:1"
          v-slot="{ field, errors }"
        >
          <input
            v-bind="field"
            type="number"
            class="input input-bordered w-full"
            :class="{ 'input-error': errors.length }"
          />
        </Field>

        <ErrorMessage
          name="platform_id"
          as="span"
          class="text-error text-sm"
        />
      </div>

      <!-- Physical / Digital -->
      <div class="form-control">
        <span class="label-text mb-2">Availability *</span>

        <label class="label cursor-pointer justify-start gap-4">
          <Field
            name="is_physical"
            type="checkbox"
            :value="true"
            class="checkbox"
          />
          <span class="label-text">Physical</span>
        </label>

        <label class="label cursor-pointer justify-start gap-4">
          <Field
            name="is_digital"
            type="checkbox"
            :value="true"
            class="checkbox"
          />
          <span class="label-text">Digital</span>
        </label>

        <ErrorMessage
          name="is_physical"
          as="span"
          class="text-error text-sm"
        />
      </div>

      <!-- Genre -->
      <div class="form-control">
        <FormLabel html-for="genre_id" :is-required="true">
          Genre
        </FormLabel>

        <Field
          id="genre_id"
          name="genre_id"
          type="number"
          rules="required|min_value:1"
          v-slot="{ field, errors }"
        >
          <input
            v-bind="field"
            type="number"
            class="input input-bordered w-full"
            :class="{ 'input-error': errors.length }"
          />
        </Field>

        <ErrorMessage
          name="genre_id"
          as="span"
          class="text-error text-sm"
        />
      </div>

      <!-- Publisher -->
      <div class="form-control">
        <FormLabel html-for="publisher_id" :is-required="true">
          Publisher
        </FormLabel>

        <Field
          id="publisher_id"
          name="publisher_id"
          type="number"
          rules="required|min_value:1"
          v-slot="{ field, errors }"
        >
          <input
            v-bind="field"
            type="number"
            class="input input-bordered w-full"
            :class="{ 'input-error': errors.length }"
          />
        </Field>

        <ErrorMessage
          name="publisher_id"
          as="span"
          class="text-error text-sm"
        />
      </div>

      <!-- Release -->
      <div class="form-control">
        <FormLabel html-for="release" :is-required="true">
          Release
        </FormLabel>

        <Field
          id="release"
          name="release"
          type="number"
          rules="required|min_value:1999"
          v-slot="{ field, errors }"
        >
          <input
            v-bind="field"
            type="number"
            class="input input-bordered w-full"
            :class="{ 'input-error': errors.length }"
          />
        </Field>

        <ErrorMessage
          name="release"
          as="span"
          class="text-error text-sm"
        />
      </div>

      <button type="submit" class="btn btn-primary w-full mt-4">
        Save Game
      </button>
    </fieldset>
  </Form>
</template>