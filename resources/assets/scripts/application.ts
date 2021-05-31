/*
 * Copyright © 2021 - яαvoroηα
 *
 * @project Sage
 * @file application.ts
 * @author ravorona
 */

import '@style/fonts.scss'
import '@style/critical.scss'
import '@style/application.scss'

import '@script/utils/register-service-worker'
import '@script/utils/register-svg'

import Main from '@script/components/Main'

/**
 * Application scripts
 */
const checkReadyState = (): void => {
    if (document.readyState === 'complete') {
        window.application = new Main('sage')

        /**
         * Start app
         */
        window.application.start()
    }
}

/**
 * Reset page scroll
 */
if (window.history && 'scrollRestoration' in window.history) {
    history.scrollRestoration = 'manual'
} else {
    window.scrollTo(0, 0)
}

/**
 * Add document state event listener
 */
document.addEventListener('readystatechange', checkReadyState)

/**
 * Check state on start
 */
checkReadyState()

