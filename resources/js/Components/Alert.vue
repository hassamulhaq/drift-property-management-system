<script setup>
/**
 * Requirements:
 * "class-variance-authority": "^0.4.0",
 * "tailwindcss": "^3.2.1",
 *
 */

import {computed} from "vue";
import {cva} from "class-variance-authority";
import CloseIcon from "@/Icons/CloseIcon.vue";
import WarningIcon from "@/Components/Icons/WarningIcon.vue";
import SuccessIcon from "@/Components/Icons/SuccessIcon.vue";
import DangerIcon from "@/Components/Icons/DangerIcon.vue";
import InfoIcon from "@/Components/Icons/InfoIcon.vue";

const props = defineProps({
    intent: {
        type: String,
        validator(value) {
            return ["info", "success", "danger", "warning"].includes(value);
        },
        default: "info",
    },
    title: String,
    show: {
        type: Boolean,
        default: true,
    },
    onDismiss: Function,
    dismissLabel: {
        type: String,
        default: "Dismiss",
    },
});

const containerClass = computed(() => {
    return cva("flex p-4 rounded-md space-x-3", {
        variants: {
            intent: {
                info: "bg-blue-100",
                success: "bg-green-100",
                warning: "bg-orange-100",
                danger: "bg-red-100",
            },
        },
    })({
        intent: props.intent,
    });
});

const iconClass = computed(() => {
    return cva("w-6 h-6", {
        variants: {
            intent: {
                info: "text-blue-700",
                success: "text-green-600",
                warning: "text-orange-400",
                danger: "text-red-500",
            },
        },
    })({
        intent: props.intent,
    });
});

const titleClass = computed(() => {
    return cva("font-medium", {
        variants: {
            intent: {
                info: "text-blue-900",
                success: "text-green-900",
                warning: "text-orange-900",
                danger: "text-red-900",
            },
        },
    })({
        intent: props.intent,
    });
});

const contentClass = computed(() => {
    return cva("text-sm", {
        variants: {
            intent: {
                info: "text-blue-800",
                success: "text-green-800",
                warning: "text-orange-800",
                danger: "text-red-800",
            },
        },
    })({
        intent: props.intent,
    });
});

const closeButtonClass = computed(() => {
    return cva("p-0.5 rounded-md -m-1", {
        variants: {
            intent: {
                info: "text-blue-900/70 hover:text-blue-900 hover:bg-blue-200 active:bg-blue-300",
                success: "text-green-900/70 hover:text-green-900 hover:bg-green-200 active:bg-green-300",
                warning: "text-orange-900/70 hover:text-orange-900 hover:bg-orange-200 active:bg-orange-300",
                danger: "text-red-900/70 hover:text-red-900 hover:bg-red-200 active:bg-red-300",
            },
        },
    })({
        intent: props.intent,
    });
});

const iconComponent = computed(() => {
    const icons = {
        success: SuccessIcon,
        warning: WarningIcon,
        danger: DangerIcon,
        info: InfoIcon,
    };

    return icons[props.intent];
});

function dismiss() {
    if (props.onDismiss) {
        props.onDismiss();
    }
}
</script>

<template>
    <div
        v-if="props.show"
        :class="containerClass"
        class="sticky-alert fixed top-4 right-4"
    >
        <div class="shrink-0">
            <component
                :is="iconComponent"
                :class="iconClass"
            />
        </div>
        <div class="flex-1 space-y-2 min-w-0">
            <h2
                v-if="props.title"
                :class="titleClass"
            >
                {{ props.title }}
            </h2>
            <div :class="contentClass">
                <slot />
            </div>
        </div>
        <div
            v-if="props.onDismiss"
            class="shrink-0"
        >
            <button
                :title="dismissLabel"
                :aria-label="dismissLabel"
                :class="closeButtonClass"
                @click="dismiss()"
            >
                <CloseIcon class="w-5 h-5"/>
            </button>
        </div>
    </div>
</template>
