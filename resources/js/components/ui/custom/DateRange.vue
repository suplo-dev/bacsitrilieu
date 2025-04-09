<script setup lang="ts">
import { cn } from '@/lib/utils';
import { Button, buttonVariants } from '@/components/ui/button';
import {
    Popover,
    PopoverContent,
    PopoverTrigger
} from '@/components/ui/popover';

import {
    RangeCalendarCell,
    RangeCalendarCellTrigger,
    RangeCalendarGrid,
    RangeCalendarGridBody,
    RangeCalendarGridHead,
    RangeCalendarGridRow,
    RangeCalendarHeadCell
} from '@/components/ui/range-calendar';
import {
    CalendarDate,
    type DateValue,
    isEqualMonth,
    startOfMonth,
    endOfMonth,
    today,
    parseDate
    } from '@internationalized/date';
import {
    Calendar,
    ChevronLeft,
    ChevronRight
} from 'lucide-vue-next';
import { type DateRange, RangeCalendarRoot, useDateFormatter } from 'reka-ui';
import { createMonth, type Grid, toDate } from 'reka-ui/date';
import { type Ref, ref, watch } from 'vue';

// Define props for v-model
const props = defineProps({
    modelValue: {
        type: Object,
        required: true
    }
});

const emit = defineEmits(['update:modelValue']);

const locale = ref('vi-VN');
const formatter = useDateFormatter(locale.value);

const startMonth = startOfMonth(today())
// Define the internal reactive states
const value = ref({
    start: props.modelValue.start ?? null,
    end: props.modelValue.end ?? null
});

const placeholder = ref<DateValue>(value.value.start ?? startMonth);
const secondMonthPlaceholder = ref<DateValue>(value.value.end ?? startMonth.add({months: 1}));

const firstMonth = ref<Grid<DateValue>>(
    createMonth({
        dateObj: placeholder.value,
        locale: locale.value,
        fixedWeeks: true,
        weekStartsOn: 0
    })
);

const secondMonth = ref<Grid<DateValue>>(
    createMonth({
        dateObj: secondMonthPlaceholder.value,
        locale: locale.value,
        fixedWeeks: true,
        weekStartsOn: 0
    })
);

watch(
    () => props.modelValue,
    (newValue) => {
        value.value.start = newValue?.start ? parseDate(newValue.start) : null;
        value.value.end = newValue?.end ? parseDate(newValue.end) : null;
    },
    { immediate: true }
);

// Watch for changes in the internal value and emit them to the parent
watch(value, (newValue) => {
    emit('update:modelValue', {
        start: newValue.start.toString(),
        end: newValue.end.toString()
    });
});

function updateMonth(reference: 'first' | 'second', months: number) {
    if (reference === 'first') {
        placeholder.value = placeholder.value.add({ months });
    } else {
        secondMonthPlaceholder.value = secondMonthPlaceholder.value.add({ months });
    }
}

watch(placeholder, (_placeholder) => {
    firstMonth.value = createMonth({
        dateObj: _placeholder,
        weekStartsOn: 0,
        fixedWeeks: false,
        locale: locale.value
    });
    if (isEqualMonth(secondMonthPlaceholder.value, _placeholder)) {
        secondMonthPlaceholder.value = secondMonthPlaceholder.value.add({
            months: 1
        });
    }
});

watch(secondMonthPlaceholder, (_secondMonthPlaceholder) => {
    secondMonth.value = createMonth({
        dateObj: _secondMonthPlaceholder,
        weekStartsOn: 0,
        fixedWeeks: false,
        locale: locale.value
    });
    if (isEqualMonth(_secondMonthPlaceholder, placeholder.value))
        placeholder.value = placeholder.value.subtract({ months: 1 });
});
</script>

<template>
    <div>
        <Popover>
            <PopoverTrigger as-child>
                <Button
                    variant="outline"
                    :class="
                        cn(
                            'w-full justify-start text-left font-normal',
                            !value && 'text-muted-foreground',
                        )
                    "
                >
                    <Calendar class="mr-2 h-4 w-4" />
                    <template v-if="value.start">
                        <template v-if="value.end">
                            {{
                                formatter.custom(toDate(value.start), {
                                    dateStyle: 'medium'
                                })
                            }}
                            -
                            {{
                                formatter.custom(toDate(value.end), {
                                    dateStyle: 'medium'
                                })
                            }}
                        </template>

                        <template v-else>
                            {{
                                formatter.custom(toDate(value.start), {
                                    dateStyle: 'medium'
                                })
                            }}
                        </template>
                    </template>
                    <template v-else>
                        -- thg --, ---- - -- thg --, ----
                    </template>
                </Button>
            </PopoverTrigger>
            <PopoverContent class="w-auto p-0">
                <RangeCalendarRoot v-slot="{ weekDays }" v-model="value" v-model:placeholder="placeholder" class="p-3"
                >
                    <div class="flex flex-col gap-y-4 mt-4 sm:flex-row sm:gap-x-4 sm:gap-y-0">
                        <div class="flex flex-col gap-4">
                            <div class="flex items-center justify-between">
                                <button
                                    :class="
                                        cn(
                                            buttonVariants({ variant: 'outline' }),
                                            'h-7 w-7 bg-transparent p-0 opacity-50 hover:opacity-100',
                                        )
                                    "
                                    @click="updateMonth('first', -1)"
                                >
                                    <ChevronLeft class="h-4 w-4" />
                                </button>
                                <div :class="cn('text-sm font-medium')">
                                    {{
                                        formatter.fullMonthAndYear(
                                            toDate(firstMonth.value)
                                        )
                                    }}
                                </div>
                                <button
                                    :class="
                                        cn(
                                            buttonVariants({ variant: 'outline' }),
                                            'h-7 w-7 bg-transparent p-0 opacity-50 hover:opacity-100',
                                        )
                                    "
                                    @click="updateMonth('first', 1)"
                                >
                                    <ChevronRight class="h-4 w-4" />
                                </button>
                            </div>
                            <RangeCalendarGrid>
                                <RangeCalendarGridHead>
                                    <RangeCalendarGridRow>
                                        <RangeCalendarHeadCell
                                            v-for="day in weekDays"
                                            :key="day"
                                            class="w-full"
                                        >
                                            {{ day }}
                                        </RangeCalendarHeadCell>
                                    </RangeCalendarGridRow>
                                </RangeCalendarGridHead>
                                <RangeCalendarGridBody>
                                    <RangeCalendarGridRow
                                        v-for="(
                                            weekDates, index
                                        ) in firstMonth.rows"
                                        :key="`weekDate-${index}`"
                                        class="mt-2 w-full"
                                    >
                                        <RangeCalendarCell
                                            v-for="weekDate in weekDates"
                                            :key="weekDate.toString()"
                                            :date="weekDate"
                                        >
                                            <RangeCalendarCellTrigger
                                                :day="weekDate"
                                                :month="firstMonth.value"
                                            />
                                        </RangeCalendarCell>
                                    </RangeCalendarGridRow>
                                </RangeCalendarGridBody>
                            </RangeCalendarGrid>
                        </div>
                        <div class="flex flex-col gap-4">
                            <div class="flex items-center justify-between">
                                <button
                                    :class="
                                        cn(
                                            buttonVariants({ variant: 'outline' }),
                                            'h-7 w-7 bg-transparent p-0 opacity-50 hover:opacity-100',
                                        )
                                    "
                                    @click="updateMonth('second', -1)"
                                >
                                    <ChevronLeft class="h-4 w-4" />
                                </button>
                                <div :class="cn('text-sm font-medium')">
                                    {{
                                        formatter.fullMonthAndYear(
                                            toDate(secondMonth.value)
                                        )
                                    }}
                                </div>

                                <button
                                    :class="
                                        cn(
                                            buttonVariants({ variant: 'outline' }),
                                            'h-7 w-7 bg-transparent p-0 opacity-50 hover:opacity-100',
                                        )
                                    "
                                    @click="updateMonth('second', 1)"
                                >
                                    <ChevronRight class="h-4 w-4" />
                                </button>
                            </div>
                            <RangeCalendarGrid>
                                <RangeCalendarGridHead>
                                    <RangeCalendarGridRow>
                                        <RangeCalendarHeadCell
                                            v-for="day in weekDays"
                                            :key="day"
                                            class="w-full"
                                        >
                                            {{ day }}
                                        </RangeCalendarHeadCell>
                                    </RangeCalendarGridRow>
                                </RangeCalendarGridHead>
                                <RangeCalendarGridBody>
                                    <RangeCalendarGridRow
                                        v-for="(
                                            weekDates, index
                                        ) in secondMonth.rows"
                                        :key="`weekDate-${index}`"
                                        class="mt-2 w-full"
                                    >
                                        <RangeCalendarCell
                                            v-for="weekDate in weekDates"
                                            :key="weekDate.toString()"
                                            :date="weekDate"
                                        >
                                            <RangeCalendarCellTrigger
                                                :day="weekDate"
                                                :month="secondMonth.value"
                                            />
                                        </RangeCalendarCell>
                                    </RangeCalendarGridRow>
                                </RangeCalendarGridBody>
                            </RangeCalendarGrid>
                        </div>
                    </div>
                </RangeCalendarRoot>
            </PopoverContent>
        </Popover>
    </div>
</template>
