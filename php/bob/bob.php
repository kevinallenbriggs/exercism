<?php

namespace redisforlosers\exercism\php;

/**
 * Bob is a lackadaisical teenager. In conversation, his responses are very limited.
 * Bob answers 'Sure.' if you ask him a question.
 * He answers 'Whoa, chill out!' if you yell at him.
 * He answers 'Calm down, I know what I'm doing!' if you yell a question at him.
 * He says 'Fine. Be that way!' if you address him without actually saying anything.
 * He answers 'Whatever.' to anything else.
 */
class Bob
{
    /**
     * Bob's default response.
     *
     * @since 2nd iteration
     * @var string
     */
    const DEFAULT_RESPONSE = 'Whatever.';

    /**
     * Bob's response to a question.
     *
     * @since 2nd iteration
     * @var string
     */
    const RESPONSE_TO_QUESTION = 'Sure.';

    /**
     * Bob's response to a yell.
     *
     * @since 2nd iteration
     * @var string
     */
    const RESPONSE_TO_YELL = 'Whoa, chill out!';

    /**
     * Bob's response to a yelled question.
     *
     * @since 2nd iteration
     * @var string
     */
    const RESPONSE_TO_YELLED_QUESTION = 'Calm down, I know what I\'m doing!';

    /**
     * Bob's response to the silent treatment.
     *
     * @since 2nd iteration
     * @var string
     */
    const RESPONSE_TO_SILENCE = 'Fine. Be that way!';

    /**
     * The message given to Bob in a conversation.
     *
     * @since 1st iteration
     *
     * @var string
     */
    private $message = '';

    /**
     * Setter method for the message property.
     *
     * @since 6th iteration
     * @param string $message
     * @return void
     */
    private function setMessage(string $message): void
    {
        // strip whitespace characters with UTF support
        $this->message = preg_replace('/\s/u', '', $message);
    }

    /**
     * Determines the reply Bob gives to any given message.
     *
     * @since       1st iteration
     * @modified    2nd iteration
     *
     * @param  string $message The message given to Bob in a conversation.
     * @return string          Bob's reply.
     */
    public function respondTo(string $message): string
    {
        $this->setMessage($message);

        if ($this->gettingTheSilentTreatment()) {
            return static::RESPONSE_TO_SILENCE;
        }

        if ($this->beingAskedAQuestion() && $this->beingYelledAt()) {
            return static::RESPONSE_TO_YELLED_QUESTION;
        }

        if ($this->beingAskedAQuestion()) {
            return static::RESPONSE_TO_QUESTION;
        }

        if ($this->beingYelledAt()) {
            return static::RESPONSE_TO_YELL;
        }

        return static::DEFAULT_RESPONSE;
    }

    /**
     * Determines if Bob is being asked a question.
     *
     * @since 1st iteration
     * @return boolean
     */
    private function beingAskedAQuestion(): bool
    {
        return preg_match('/\?\s*$/u', $this->message);
    }

    /**
     * Determines if Bob is being yelled at.
     *
     * @since 1st iteration
     * @return boolean
     */
    private function beingYelledAt(): bool
    {
        return mb_strtoupper($this->message) === $this->message &&
            preg_match('/\pL/u', $this->message);
    }

    /**
     * Determines if anything was said to Bob in the message.
     *
     * @since 1st iteration
     * @return boolean
     */
    private function gettingTheSilentTreatment(): bool
    {
        return empty($this->message);
    }
}
