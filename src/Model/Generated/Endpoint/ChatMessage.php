<?php
namespace bunq\Model\Generated\Endpoint;

use bunq\exception\BunqException;
use bunq\Http\ApiClient;
use bunq\Model\Core\AnchorObjectInterface;
use bunq\Model\Core\BunqModel;

/**
 * Endpoint for retrieving the messages that are part of a conversation.
 *
 * @generated
 */
class ChatMessage extends BunqModel implements AnchorObjectInterface
{
    /**
     * Error constants.
     */
    const ERROR_NULL_FIELDS = 'All fields of an extended model or object are null.';

    /**
     * Endpoint constants.
     */
    const ENDPOINT_URL_LISTING = 'user/%s/chat-conversation/%s/message';

    /**
     * Object type.
     */
    const OBJECT_TYPE_GET = 'ChatMessage';

    /**
     * @var ChatMessageAnnouncement
     */
    protected $chatMessageAnnouncement;

    /**
     * @var ChatMessageStatus
     */
    protected $chatMessageStatus;

    /**
     * @var ChatMessageUser
     */
    protected $chatMessageUser;

    /**
     * Get all the messages that are part of a specific conversation.
     *
     * This method is called "listing" because "list" is a restricted PHP word
     * and cannot be used as constants, class names, function or method names.
     *
     * @param int $chatConversationId
     * @param string[] $params
     * @param string[] $customHeaders
     *
     * @return BunqResponseChatMessageList
     */
    public static function listing(
        int $chatConversationId,
        array $params = [],
        array $customHeaders = []
    ): BunqResponseChatMessageList {
        $apiClient = new ApiClient(static::getApiContext());
        $responseRaw = $apiClient->get(
            vsprintf(
                self::ENDPOINT_URL_LISTING,
                [static::determineUserId(), $chatConversationId]
            ),
            $params,
            $customHeaders
        );

        return BunqResponseChatMessageList::castFromBunqResponse(
            static::fromJsonList($responseRaw)
        );
    }

    /**
     * @return ChatMessageAnnouncement
     */
    public function getChatMessageAnnouncement()
    {
        return $this->chatMessageAnnouncement;
    }

    /**
     * @deprecated User should not be able to set values via setters, use
     * constructor.
     *
     * @param ChatMessageAnnouncement $chatMessageAnnouncement
     */
    public function setChatMessageAnnouncement($chatMessageAnnouncement)
    {
        $this->chatMessageAnnouncement = $chatMessageAnnouncement;
    }

    /**
     * @return ChatMessageStatus
     */
    public function getChatMessageStatus()
    {
        return $this->chatMessageStatus;
    }

    /**
     * @deprecated User should not be able to set values via setters, use
     * constructor.
     *
     * @param ChatMessageStatus $chatMessageStatus
     */
    public function setChatMessageStatus($chatMessageStatus)
    {
        $this->chatMessageStatus = $chatMessageStatus;
    }

    /**
     * @return ChatMessageUser
     */
    public function getChatMessageUser()
    {
        return $this->chatMessageUser;
    }

    /**
     * @deprecated User should not be able to set values via setters, use
     * constructor.
     *
     * @param ChatMessageUser $chatMessageUser
     */
    public function setChatMessageUser($chatMessageUser)
    {
        $this->chatMessageUser = $chatMessageUser;
    }

    /**
     * @return BunqModel
     * @throws BunqException
     */
    public function getReferencedObject()
    {
        if (!is_null($this->chatMessageAnnouncement)) {
            return $this->chatMessageAnnouncement;
        }

        if (!is_null($this->chatMessageStatus)) {
            return $this->chatMessageStatus;
        }

        if (!is_null($this->chatMessageUser)) {
            return $this->chatMessageUser;
        }

        throw new BunqException(self::ERROR_NULL_FIELDS);
    }

    /**
     * @return bool
     */
    public function isAllFieldNull()
    {
        if (!is_null($this->chatMessageAnnouncement)) {
            return false;
        }

        if (!is_null($this->chatMessageStatus)) {
            return false;
        }

        if (!is_null($this->chatMessageUser)) {
            return false;
        }

        return true;
    }
}
