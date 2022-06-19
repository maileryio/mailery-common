<?php

namespace Mailery\Common\Field;

use Mailery\Common\Model\Timezones;
use Yiisoft\Translator\TranslatorInterface;

class Timezone
{

    /**
     * @var bool
     */
    private bool $offset = false;

    /**
     * @var TranslatorInterface|null
     */
    private ?TranslatorInterface $translator = null;

    /**
     * @param string $value
     */
    private function __construct(
        private string $value
    ) {
        if (!in_array($value, self::getValues())) {
            throw new \InvalidArgumentException('Invalid passed value: ' . $value);
        }
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->value;
    }

    /**
     * @param string $value
     * @return static
     */
    public static function typecast(string $value): static
    {
        return new static($value);
    }

    /**
     * @param bool $offset
     * @return self
     */
    public function withOffset(bool $offset): self
    {
        $new = clone $this;
        $new->offset = $offset;

        return $new;
    }

    /**
     * @param TranslatorInterface $translator
     * @return self
     */
    public function withTranslator(TranslatorInterface $translator): self
    {
        $new = clone $this;
        $new->translator = $translator;

        return $new;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @return string
     */
    public function getLabel(): string
    {
        return (new Timezones())
            ->withOffset($this->offset)
            ->getLabel($this->value);
    }

    /**
     * @return array
     */
    private static function getValues(): array
    {
        return array_keys((new Timezones())->getAll());
    }

}
